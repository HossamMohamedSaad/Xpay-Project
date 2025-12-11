<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\monthly_income_source;
use Illuminate\Http\Request;

class MonthlyIncomeSourceController extends Controller
{
    public function index()
    {
        $sources = auth()->guard('client')->user()->monthly_income_source;

        return view('client.pages.month_income.index', compact('sources'));
    }

    public function add()
    {
        $income_sources = auth()->guard('client')->user()->income_source;

        return view('client.pages.month_income.add', compact('income_sources'));
    }

    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'income_source_id' => 'required|exists:income_sources,id',
            'amount' => 'required|numeric',
            'period' => 'required|integer',
        ],
            [
                'income_source_id.required' => '  income source is required',
                'income_source_id.exists' => 'income source does not exist',
                'amount.numeric' => 'amount must be a number',
                'amount.required' => 'amount is required',
                'period.required' => 'period is required',
                'period.integer' => 'period must be integer',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $monthly_income_source = new monthly_income_source;
        $monthly_income_source->client_id = auth()->guard('client')->user()->id;
        $monthly_income_source->income_source_id = $request->income_source_id;
        $monthly_income_source->amount = $request->amount;
        $monthly_income_source->period = $request->period;
        $monthly_income_source->save();

        return redirect()->route('client.month_income.index')->with('success', 'Monthly income created successfully');
    }

    public function edit($id)
    {

        $income_sources = auth()->guard('client')->user()->income_source;
        $month_income = monthly_income_source::findOrFail($id);

        return view('client.pages.month_income.update', compact('income_sources', 'month_income'));
    }

    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'income_source_id' => 'required|exists:income_sources,id',
            'amount' => 'required|numeric',
            'period' => 'required|integer',
        ],
            [
                'income_source_id.required' => '  income source is required',
                'income_source_id.exists' => 'income source does not exist',
                'amount.numeric' => 'amount must be a number',
                'amount.required' => 'amount is required',
                'period.required' => 'period is required',
                'period.integer' => 'period must be integer',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $monthly_income_source = monthly_income_source::findOrFail($request->id);
        $monthly_income_source->client_id = auth()->guard('client')->user()->id;
        $monthly_income_source->income_source_id = $request->income_source_id;
        $monthly_income_source->amount = $request->amount;
        $monthly_income_source->period = $request->period;
        $monthly_income_source->save();

        return redirect()->route('client.month_income.index')->with('success', 'Monthly income updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = monthly_income_source::findOrFail($id);
        $income->delete();

        return redirect()->route('client.month_income.index')->with('success', 'Monthly income deleted successfully');
    }
}
