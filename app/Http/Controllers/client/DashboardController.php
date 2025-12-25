<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\expense_category;
use App\Models\expenses;
use App\Models\income;
use App\Models\income_source;
use App\Models\monthly_expense_category;
use App\Models\monthly_income_source;
use App\Models\monthly_report;
use App\Models\transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $month = (int) now()->month;
        $year = (int) now()->year;
        $client_id = auth()->guard('client')->user()->id;

        $accounts = account::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();
        $incomes = income::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(20)->get();
        $expenses = expenses::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(20)->get();
        $sources = income_source::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();
        $expences_category = expense_category::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();
        $transactions = transaction::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();
        $monthly_incomes = monthly_income_source::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();
        $monthly_expenses = monthly_expense_category::where('client_id', $client_id)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)->take(10)->get();

        $total_balance = account::where('client_id', $client_id)->sum('amount');
        $total_income = income::where('client_id', $client_id)
                                ->whereMonth('created_at', $month)
                                ->whereYear('created_at', $year)
                                ->sum('amount');
        $total_expense = expenses::where('client_id', $client_id)
                                ->whereMonth('created_at', $month)
                                ->whereYear('created_at', $year)
                                ->sum('amount');

        return view('client.pages.dashboard.index', get_defined_vars());
    }
}
