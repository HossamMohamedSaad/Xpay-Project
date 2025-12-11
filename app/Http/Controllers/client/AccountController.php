<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->guard('client')->user()->accounts->where('is_default', true)->first())
        {
            $accountd = auth()->guard('client')->user()->accounts->where('is_default', true)->first();
        }
        else{
            $accountd = null;
            
        }
        $accounts = auth()->guard('client')->user()->accounts;
        return view('client.pages.account.index', compact('accounts', 'accountd'));
    }

    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ],
            [
                'name.required' => 'Account name is required',
                'amount.required' => 'Account price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'amount.numeric' => 'Amount must be a number',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $account = new account;
        $account->client_id = auth()->guard('client')->user()->id;
        $account->name = $request->name;
        $account->amount = $request->amount;
        $account->save();

        return redirect()->route('client.account.index')->with('success', 'Account created successfully');
    }

    public function add()
    {
        return view('client.pages.account.add');

    }


    

    public function edit(Request $request)
    {
        $id = $request->id;
        // $account = account::where("id",$id)->first();
        $account = account::find($id);

        return view('client.pages.account.update', compact('account'));
    }

    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ],
            [
                'name.required' => 'Plan name is required',
                'amount.required' => 'Plan price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'amount.numeric' => 'Amount must be a number',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $account = account::findOrFail($request->id);
        $account->client_id = auth()->guard('client')->user()->id;
        $account->name = $request->name;
        $account->amount = $request->amount;
        if ($request->has('default')) {
            foreach (account::where('client_id', auth()->guard('client')->user()->id)->where('is_default', true)->get() as $acc) {
                
                $acc->is_default = false;
                $acc->save();
            }
            $account->is_default = true;
        }
        $account->save();

        return redirect()->route('client.account.index')->with('success', 'Account created successfully');
        // return view('client.pages.account.update', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $account = account::findOrFail($request->id);
        $account->delete();

        return redirect()->route('client.account.index')->with('success', 'Account deleted successfully');
    }
}
