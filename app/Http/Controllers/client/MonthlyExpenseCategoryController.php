<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\monthly_expense_category;
use Illuminate\Http\Request;

class MonthlyExpenseCategoryController extends Controller
{
    public function index()
    {
        $sources = auth()->guard('client')->user()->monthly_expense_category;

        return view('client.pages.month_expense.index', compact('sources'));
    }

    public function add()
    {
        $expense_categories = auth()->guard('client')->user()->expense_category;

        return view('client.pages.month_expense.add', compact('expense_categories'));
    }

    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric',
            'period' => 'required|integer',
        ],
            [
                'expense_category_id.required' => '  income source is required',
                'expense_category_id.exists' => 'income source does not exist',
                'amount.numeric' => 'amount must be a number',
                'amount.required' => 'amount is required',
                'period.required' => 'period is required',
                'period.integer' => 'period must be integer',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $monthly_expense_category = new monthly_expense_category();
        $monthly_expense_category->client_id = auth()->guard('client')->user()->id;
        $monthly_expense_category->expense_category_id = $request->expense_category_id;
        $monthly_expense_category->amount = $request->amount;
        $monthly_expense_category->period = $request->period;
        $monthly_expense_category->save();

        return redirect()->route('client.month_expense.index')->with('success', 'Monthly Expenses created successfully');
    }

    public function edit($id)
    {

        $expense_categories = auth()->guard('client')->user()->expense_category;
        $month_category = monthly_expense_category::findOrFail($id);

        return view('client.pages.month_expense.update', compact('expense_categories', 'month_category'));
    }

    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric',
            'period' => 'required|integer',
        ],
            [
                'expense_category_id.required' => '  income source is required',
                'expense_category_id.exists' => 'income source does not exist',
                'amount.numeric' => 'amount must be a number',
                'amount.required' => 'amount is required',
                'period.required' => 'period is required',
                'period.integer' => 'period must be integer',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $monthly_expense_category = monthly_expense_category::findOrFail($request->id);
        $monthly_expense_category->client_id = auth()->guard('client')->user()->id;
        $monthly_expense_category->expense_category_id = $request->expense_category_id;
        $monthly_expense_category->amount = $request->amount;
        $monthly_expense_category->period = $request->period;
        $monthly_expense_category->save();

        return redirect()->route('client.month_expense.index')->with('success', 'Monthly Expense updated successfully');

    }

    
    public function destroy($id)
    {
        $income = monthly_expense_category::findOrFail($id);
        $income->delete();

        return redirect()->route('client.month_expense.index')->with('success', 'Monthly Expense deleted successfully');
    }
}
