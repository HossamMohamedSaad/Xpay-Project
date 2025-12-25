<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use Spatie\SimpleExcel\SimpleExcelWriter;


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

        $incomes = income::where('incomes.client_id', $clientId)
            ->whereBetween('incomes.created_at', [$start, $end])
            ->get();

        $expenses = expenses::where('expenses.client_id', $clientId)
            ->whereBetween('expenses.created_at', [$start, $end])
            ->get();
            
        


        
        return view('client.pages.report.index', compact( 'start', 'end','incomes' , 'expenses'));
    }
    
    public function exportIncome(Request $request)
    {
        $clientId = auth()->guard('client')->id();

        $validated = $request->validate([
            'from' => ['nullable', 'date'],
            'to'   => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        [$start, $end] = $this->resolveDateRange($validated);

        $fileName = 'report_income_' . $start->format('Y-m-d') . '_to_' . $end->format('Y-m-d') . '.xlsx';

        $writer = SimpleExcelWriter::streamDownload($fileName)
            ->addHeader(['Date', 'Type', 'Source', 'Account', 'Amount', 'Description']);

        $query = income::where('client_id', $clientId)
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at', 'asc');

        foreach ($query->cursor() as $incomeRow) {
            $writer->addRow([
                'Date'        => Carbon::parse($incomeRow->created_at)->format('d/m/Y H:i'),
                'Type'        => 'Income',
                'Source'      => $incomeRow->income_source?->name ?? 'EDIT BY USER',
                'Account'     => $incomeRow->account?->name ?? ($incomeRow->account_name ?? '-'),
                'Amount'      => $incomeRow->amount,
                'Description' => $incomeRow->description ?? '',
            ]);
        }

        return $writer->toBrowser();
    }

    public function exportExpense(Request $request)
    {
        $clientId = auth()->guard('client')->id();

        $validated = $request->validate([
            'from' => ['nullable', 'date'],
            'to'   => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        [$start, $end] = $this->resolveDateRange($validated);

        $fileName = 'report_expense_' . $start->format('Y-m-d') . '_to_' . $end->format('Y-m-d') . '.xlsx';

        $writer = SimpleExcelWriter::streamDownload($fileName)
            ->addHeader(['Date', 'Type', 'Source', 'Account', 'Amount', 'Description']);

        $query = expenses::where('client_id', $clientId)
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at', 'asc');

        foreach ($query->cursor() as $expenseRow) {
            $writer->addRow([
                'Date'        => Carbon::parse($expenseRow->created_at)->format('d/m/Y H:i'),
                'Type'        => 'Expense',
                'Source'      => $expenseRow->expense_category?->name ?? 'EDIT BY USER',
                'Account'     => $expenseRow->account?->name ?? ($expenseRow->account_name ?? '-'),
                'Amount'      => $expenseRow->amount,
                'Description' => $expenseRow->description ?? '',
            ]);
        }

        return $writer->toBrowser();
    }


    
    private function resolveDateRange(array $validated): array
    {
        if (empty($validated['from']) && empty($validated['to'])) {
            $start = Carbon::now('Africa/Cairo')->startOfMonth();
            $end   = Carbon::now('Africa/Cairo')->endOfMonth();
            return [$start, $end];
        }

        $from = $validated['from'] ?? $validated['to'];
        $to   = $validated['to']   ?? $validated['from'];

        $start = Carbon::parse($from, 'Africa/Cairo')->startOfDay();
        $end   = Carbon::parse($to, 'Africa/Cairo')->endOfDay();

        return [$start, $end];
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
