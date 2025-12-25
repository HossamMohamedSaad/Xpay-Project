<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\income;
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

    public function pay($id)
    {

        $accounts = auth()->guard('client')->user()->accounts;
        $month_category = monthly_income_source::findOrFail($id);
        $amount = $month_category->amount;
        $income_source_id = $month_category->income_source_id;
        // dd($income_source_id);

        return view('client.pages.month_income.pay', get_defined_vars());
    }
    public function confirmGet(Request $request)
    {
        // dd($request->all());
        $validator = validator()->make($request->all(), [
            'account' => 'required|exists:accounts,id',
            'income_source_id' => 'required|exists:income_sources,id',
            'month_category_id' => 'required|exists:monthly_income_sources,id',
            'amount' => 'required|numeric',
            
        ],
            [
                'account.required' => ' account is required',
                'account.exists' => 'account does not exist',
                'income_source_id.required' => 'month category is required',
                'income_source_id.exists' => 'month category does not exist',
                'month_category_id.required' => 'month category is required',
                'month_category_id.exists' => 'month category does not exist',
                'amount.required' => 'amount is required',
                'amount.numeric' => 'amount must be a number',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        
        \DB::beginTransaction();
        try {
            

            $income = new income();
            $income->client_id = auth()->guard('client')->user()->id;
            $income->account_id = $request->account;
            $income->income_source_id = $request->income_source_id;
            $income->amount = $request->amount;
            $income->description = "Monthly Expense Payment";
            $income->save();

            
            $account = account::findOrFail($request->account);
            $account->amount = $account->amount + $request->amount;
            $account->save();
            



            \DB::commit();
            return redirect()->route('client.month_income.index')->with('success', 'income paid successfully');
        }catch(\Exception $e){
           \DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
        
    }



    public function destroy($id)
    {
        $income = monthly_income_source::findOrFail($id);
        $income->delete();

        return redirect()->route('client.month_income.index')->with('success', 'Monthly income deleted successfully');
    }
}
