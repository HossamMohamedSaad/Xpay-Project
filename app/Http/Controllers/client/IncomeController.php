<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
   public function index()
    {
        $incomes = auth()->guard('client')->user()->income()->latest()->get();

        return view('client.pages.income.index', compact('incomes'));
    }

    
    public function add()
    {
        $income_sources = auth()->guard('client')->user()->income_source;
        $accounts = auth()->guard('client')->user()->accounts;

        return view('client.pages.income.add' ,get_defined_vars());
    }

    

    public function create(Request $request)
    {
         $validator = validator()->make($request->all(), [
            'income_source_id' => 'required|integer|exists:income_sources,id',
            'account_id' => 'required|integer|exists:accounts,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ],
            [
                'income_source_id.required' => 'income source is required',
                'account_id.required' => 'account is required',
                'amount.required' => 'amount is required',
                'description.required' => 'income source price is required',
                'amount.numeric' => 'amount must be a number',
                'description.string' => 'Description must be a string',
                'description.max' => 'Description must not exceed 255 characters',
                'account_id.exists' => 'account does not exist',
                'income_source_id.exists' => 'income source does not exist',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        if($request->amount <= 0){
            return redirect()->back()->with('error', 'Amount must be greater than 0')->withInput();
        }
        // $account = account::find($request->account_id);
        // if($request->amount >= $account->amount){
        //     return redirect()->back()->with('error', 'Amount must be greater than account balance')->withInput();
        // }
        \DB::beginTransaction();
        try {
            

            $account = account::find($request->account_id);
            $account->amount = $account->amount  + $request->amount;
            $account->save();
    
    
            $income = new income;
            $income->client_id = auth()->guard('client')->user()->id;
            $income->account_id = $request->account_id;
            $income->income_source_id = $request->income_source_id;
            $income->amount = $request->amount;
            $income->description = $request->description;
            $income->save();
    
            \DB::commit();
            return redirect()->route('client.income.index')->with('success', 'Income source created successfully');

        }catch(\Exception $e)
        {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong')->withInput();
        }
    }

     public function edit($id)
    {
        $income_sources = auth()->guard('client')->user()->income_source;
        $accounts = auth()->guard('client')->user()->accounts;
        $income = income::findOrFail( $id);

        return view('client.pages.income.update', get_defined_vars());
    }
    

    
    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'income_source_id' => 'required|integer|exists:income_sources,id',
            'account_id' => 'required|integer|exists:accounts,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ],
            [
                'income_source_id.required' => 'income source is required',
                'account_id.required' => 'account is required',
                'amount.required' => 'amount is required',
                'description.required' => 'income source price is required',
                'amount.numeric' => 'amount must be a number',
                'description.string' => 'Description must be a string',
                'description.max' => 'Description must not exceed 255 characters',
                'account_id.exists' => 'account does not exist',
                'income_source_id.exists' => 'income source does not exist',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        if($request->amount <= 0){
            return redirect()->back()->with('error', 'Amount must be greater than 0')->withInput();
        }
        // $account = account::find($request->account_id);
        // if($request->amount >= $account->amount){
        //     return redirect()->back()->with('error', 'Amount must be greater than account balance')->withInput();
        // }
        \DB::beginTransaction();
        try {
            
            $income = income::findOrFail($request->id);
            $income->client_id = auth()->guard('client')->user()->id;
            $income->account_id = $request->account_id;
            $income->income_source_id = $request->income_source_id;
            $income->amount = $request->amount;
            $income->description = $request->description;
            $income->save();
             
            // dd($request->all());
            
            if($request->oldaccount_id != $request->account_id){
                $oldaccount = account::find($request->oldaccount_id);
                $oldaccount->amount = $oldaccount->amount - $request->oldamount ;
                $oldaccount->save();

                $account = account::find($request->account_id);
                $account->amount = $account->amount  + $request->amount;
                $account->save();
            }else
            {
                $account = account::find($request->account_id);
                $account->amount = $account->amount - $request->oldamount + $request->amount;
                $account->save();
            }

            \DB::commit();
            return redirect()->route('client.income.index')->with('success', 'Income source created successfully');
        }catch(Exception $e){
           \DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    
    public function destroy($id)
    {
        $income = income::findOrFail($id);
        $income->delete();

        return redirect()->route('client.income.index')->with('success', 'Account deleted successfully');
    }
}
