<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = auth()->guard('client')->user()->transaction;
        $accounts = auth()->guard('client')->user()->account;

        return view('client.pages.transaction.index', compact('transactions', 'accounts'));
    }

    public function add()
    {

        $accounts = auth()->guard('client')->user()->accounts;
        if (! $accounts) {
            return redirect()->route('client.transaction.index')->with('error', 'You have no accounts');
        }

        return view('client.pages.transaction.add', compact('accounts'));

    }

    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'from_account' => 'required|exists:accounts,id',
            'to_account' => 'required|exists:accounts,id',
            'amount' => 'required|numeric',
            'short_description' => 'nullable|string|max:55',
            'description' => 'nullable|string|max:255',
        ],
            [
                'from_account.required' => ' from account is required',
                'from_account.exists' => 'from account does not exist',
                'to_account.required' => 'to account is required',
                'to_account.exists' => 'to account does not exist',
                'amount.required' => 'amount is required',
                'amount.numeric' => 'amount must be a number',
                'short_description.string' => 'short description must be a string',
                'short_description.max' => 'short description must not exceed 255 characters',
                'description.string' => 'description must be a string',
                'description.max' => 'description must not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $from_account = auth()->guard('client')->user()->accounts()->where('id', $request->from_account)->first();
        $to_account = auth()->guard('client')->user()->accounts()->where('id', $request->to_account)->first();

        if (! $from_account || ! $to_account) {
            return redirect()->route('client.transaction.index')->with('error', 'Invalid account');
        }

        if ($from_account->amount < $request->amount) {
            return redirect()->route('client.transaction.index')->with('error', 'Insufficient balance');
        }
        if ($from_account->id == $to_account->id) {
            return redirect()->route('client.transaction.index')->with('error', 'Cannot transfer to the same account');
        }
        DB::beginTransaction();
        try {

            $from_account->amount -= $request->amount;
            $from_account->save();

            $to_account->amount += $request->amount;
            $to_account->save();

            $transaction = new transaction;
            $transaction->client_id = auth()->guard('client')->user()->id;
            $transaction->from_account = $request->from_account;
            $transaction->to_account = $request->to_account;
            $transaction->amount = $request->amount;
            $transaction->short_description = $request->short_description;
            $transaction->description = $request->description;
            $transaction->save();
            DB::commit();

            return redirect()->route('client.transaction.index')->with('success', 'Transaction added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction error: '.$e->getMessage());

            return redirect()->route('client.transaction.index')->with('error', 'Transaction  Failed');

        }

    }
}
