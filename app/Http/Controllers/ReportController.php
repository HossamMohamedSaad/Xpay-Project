<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use App\Models\income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $clientId = auth()->guard('client')->id();

        // $validated = $request->validate([
        //     'from' => ['nullable', 'date'],
        //     'to'   => ['nullable', 'date', 'after_or_equal:from'],
        // ]);

        // // Default: current month if no dates provided
        // if (empty($validated['from']) && empty($validated['to'])) {
        //     $start = Carbon::now('Africa/Cairo')->startOfMonth();
        //     $end   = Carbon::now('Africa/Cairo')->endOfMonth();
        // } else {
        //     // if only one provided, use it for both
        //     $from = $validated['from'] ?? $validated['to'];
        //     $to   = $validated['to']   ?? $validated['from'];

        //     $start = Carbon::parse($from, 'Africa/Cairo')->startOfDay();
        //     $end   = Carbon::parse($to, 'Africa/Cairo')->endOfDay();
        // }
        $from = $this->parseClientDate($request->input('from'), 'from');
        $to = $this->parseClientDate($request->input('to'), 'to');

        if (! $from && ! $to) {
            $start = Carbon::now('Africa/Cairo')->startOfMonth();
            $end = Carbon::now('Africa/Cairo')->endOfMonth();
        } else {
            $start = ($from ?? $to)->copy()->startOfDay();
            $end = ($to ?? $from)->copy()->endOfDay();

            if ($end->lt($start)) {
                throw ValidationException::withMessages([
                    'to' => 'To date must be after or equal From date',
                ]);
            }
        }

        $incomes = income::query()
            ->where('incomes.client_id', $clientId)
            ->whereBetween('incomes.created_at', [$start, $end])
            ->leftJoin('income_sources as s', 's.id', '=', 'incomes.income_source_id')
            ->leftJoin('accounts as a', 'a.id', '=', 'incomes.account_id')
            ->selectRaw("
            incomes.id,
            incomes.client_id,
            incomes.amount,
            incomes.description,
            incomes.created_at,
            incomes.income_source_id as source_id,
            s.name as source_name,
            incomes.account_id as account_id,
            a.name as account_name,
            'income' as type
        ");

        $expenses = expenses::query()
            ->where('expenses.client_id', $clientId)
            ->whereBetween('expenses.created_at', [$start, $end])
            ->leftJoin('expense_categories as s', 's.id', '=', 'expenses.expense_category_id')
            ->leftJoin('accounts as a', 'a.id', '=', 'expenses.account_id')
            ->selectRaw("
            expenses.id,
            expenses.client_id,
            expenses.amount,
            expenses.description,
            expenses.created_at,
            expenses.expense_category_id as source_id,
            s.name as source_name,
            expenses.account_id as account_id,
            a.name as account_name,
            'expense' as type
        ");

        $union = $incomes->unionAll($expenses);

        $rows = \DB::query()
            ->fromSub($union, 't')
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString(); // مهم عشان pagination يحتفظ بـ from/to

        return view('client.pages.report.index', compact('rows', 'start', 'end'));
    }

    public function export(Request $request)
    {
        $clientId = auth()->guard('client')->id();

        $validated = $request->validate([
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        // Default = current month
        if (empty($validated['from']) && empty($validated['to'])) {
            $start = Carbon::now('Africa/Cairo')->startOfMonth();
            $end = Carbon::now('Africa/Cairo')->endOfMonth();
        } else {
            $from = $validated['from'] ?? $validated['to'];
            $to = $validated['to'] ?? $validated['from'];

            $start = Carbon::parse($from, 'Africa/Cairo')->startOfDay();
            $end = Carbon::parse($to, 'Africa/Cairo')->endOfDay();
        }

        // نفس Query بتاع التقرير (Union + joins) لكن هنا هنجبه كله للتصدير
        $incomes = income::query()
            ->where('incomes.client_id', $clientId)
            ->whereBetween('incomes.created_at', [$start, $end])
            ->leftJoin('income_sources as s', 's.id', '=', 'incomes.income_source_id')
            ->leftJoin('accounts as a', 'a.id', '=', 'incomes.account_id')
            ->selectRaw("
            incomes.id,
            incomes.amount,
            incomes.description,
            incomes.created_at,
            incomes.income_source_id as source_id,
            s.name as source_name,
            a.name as account_name,
            'income' as type
        ");

        $expenses = expenses::query()
            ->where('expenses.client_id', $clientId)
            ->whereBetween('expenses.created_at', [$start, $end])
            ->leftJoin('expense_categories as s', 's.id', '=', 'expenses.expense_category_id')
            ->leftJoin('accounts as a', 'a.id', '=', 'expenses.account_id')
            ->selectRaw("
            expenses.id,
            expenses.amount,
            expenses.description,
            expenses.created_at,
            expenses.expense_category_id as source_id,
            s.name as source_name,
            a.name as account_name,
            'expense' as type
        ");

        $union = $incomes->unionAll($expenses);

        $rows = DB::query()
            ->fromSub($union, 't')
            ->orderByDesc('created_at')
            ->get();

        $fileName = 'report_'.$start->format('Y-m-d').'_to_'.$end->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($rows) {
            $out = fopen('php://output', 'w');

            // BOM عشان العربي يطلع صح في Excel
            fwrite($out, "\xEF\xBB\xBF");

            fputcsv($out, ['Date', 'Type', 'Source', 'Account', 'Amount', 'Description']);

            foreach ($rows as $row) {
                fputcsv($out, [
                    Carbon::parse($row->created_at)->format('d/m/Y H:i'),
                    $row->type === 'income' ? 'Income' : 'Expense',
                    $row->source_id ? ($row->source_name ?? '-') : 'EDIT BY USER',
                    $row->account_name ?? '-',
                    $row->amount,
                    $row->description ?? '',
                ]);
            }

            fclose($out);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    

    private function parseClientDate(?string $value, string $field): ?Carbon
    {
        if (! $value) {
            return null;
        }

        $value = trim($value);

        foreach (['d/m/Y', 'Y-m-d'] as $fmt) {
            try {
                return Carbon::createFromFormat($fmt, $value, 'Africa/Cairo');
            } catch (\Throwable $e) {
            }
        }

        throw ValidationException::withMessages([
            $field => 'Invalid date format. Use dd/mm/yyyy',
        ]);
    }
}
