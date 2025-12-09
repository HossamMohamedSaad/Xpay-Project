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
        $account = account::all();
        return view('client.pages.account.index' , compact("account"));
    }
    
    
    public function create(Request $request)
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

        $account = new account();
        $account->name = $request->name;
        $account->amount = $request->amount;
        $account->save();

        return $request;
        
    }
    public function add()
    {
        return view('client.pages.account.add' );
        
    }
    
    
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(account $account)
    {
        //
    }
}
