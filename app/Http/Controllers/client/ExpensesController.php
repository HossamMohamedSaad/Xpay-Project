<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
   
   public function index()
    {
        $expenses = auth()->guard('client')->user()->expenses()->latest()->get();

        return view('client.pages.expense.index', compact('expenses'));
    }

    
    public function add()
    {
        $expense_categorys = auth()->guard('client')->user()->expense_category;
        $accounts = auth()->guard('client')->user()->accounts;

        return view('client.pages.expense.add' ,get_defined_vars());
    }

    

    public function create(Request $request)
    {
         $validator = validator()->make($request->all(), [
            'expense_category_id' => 'required|integer|exists:expense_categories,id',
            'account_id' => 'required|integer|exists:accounts,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ],
            [
                'expense_category_id.required' => 'expense source is required',
                'account_id.required' => 'account is required',
                'amount.required' => 'amount is required',
                'description.required' => 'expense source price is required',
                'amount.numeric' => 'amount must be a number',
                'description.string' => 'Description must be a string',
                'description.max' => 'Description must not exceed 255 characters',
                'account_id.exists' => 'account does not exist',
                'expense_category_id.exists' => 'expense source does not exist',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        if($request->amount <= 0){
            return redirect()->back()->with('error', 'Amount must be greater than 0')->withInput();
        }
        $account = account::find($request->account_id);
        if($request->amount > $account->amount){
            return redirect()->back()->with('error', 'Amount must be greater than account balance')->withInput();
        }
        \DB::beginTransaction();
        try {
            

            $account = account::find($request->account_id);
            $account->amount = $account->amount  - $request->amount;
            $account->save();
    
    
            $expense = new expenses;
            $expense->client_id = auth()->guard('client')->user()->id;
            $expense->account_id = $request->account_id;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->amount = $request->amount;
            $expense->description = $request->description;
            $expense->save();
    
            \DB::commit();
            return redirect()->route('client.expense.index')->with('success', 'expense source created successfully');

        }catch(\Exception $e)
        {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong')->withInput();
        }
    }

     public function edit($id)
    {
        $expense_categorys = auth()->guard('client')->user()->expense_category;
        $accounts = auth()->guard('client')->user()->accounts;
        $expense = expenses::findOrFail( $id);

        return view('client.pages.expense.update', get_defined_vars());
    }
    

    
    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'expense_category_id' => 'required|integer|exists:expense_categories,id',
            'account_id' => 'required|integer|exists:accounts,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ],
            [
                'expense_category_id.required' => 'expense source is required',
                'account_id.required' => 'account is required',
                'amount.required' => 'amount is required',
                'description.required' => 'expense source price is required',
                'amount.numeric' => 'amount must be a number',
                'description.string' => 'Description must be a string',
                'description.max' => 'Description must not exceed 255 characters',
                'account_id.exists' => 'account does not exist',
                'expense_category_id.exists' => 'expense source does not exist',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        if($request->amount <= 0){
            return redirect()->back()->with('error', 'Amount must be greater than 0')->withInput();
        }
        $account = account::find($request->account_id);
        if($request->amount > $account->amount){
            return redirect()->back()->with('error', 'Amount must be greater than account balance')->withInput();
        }
        \DB::beginTransaction();
        try {
            
            $expense = expenses::findOrFail($request->id);
            $expense->client_id = auth()->guard('client')->user()->id;
            $expense->account_id = $request->account_id;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->amount = $request->amount;
            $expense->description = $request->description;
            $expense->save();

            if($request->oldaccount_id != $request->account_id){
                $oldaccount = account::findOrFail($request->oldaccount_id);

                $oldaccount->amount = $oldaccount->amount + $request->oldamount ;
                $oldaccount->save();

                $account = account::findOrFail($request->account_id);
                $account->amount = $account->amount  - $request->amount;
                $account->save();
            }else
            {
                $account = account::findOrFail($request->account_id);
                $account->amount = $account->amount + $request->oldamount - $request->amount;
                $account->save();
            }



            \DB::commit();
            return redirect()->route('client.expense.index')->with('success', 'expense source created successfully');
        }catch(Exception $e){
           \DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    
    public function destroy($id)
    {
        $expense = expenses::findOrFail($id);
        $expense->delete();

        return redirect()->route('client.expense.index')->with('success', 'Account deleted successfully');
    }}
