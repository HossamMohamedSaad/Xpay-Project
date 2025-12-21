<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\client;
use App\Models\plan;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = payment::paginate(10);
        // dd($payments);
        return view('admin.pages.payment.index' , compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $clients = client::all();
        $plans = plan::all();
        return view('admin.pages.payment.add', compact('clients', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
$validator = validator()->make($request->all(), [
            'client_id' => 'required|exists:clients,id',
            'plan' => 'required|exists:plans,id',
            'amount_cents' => 'required|integer',

            
            
        ],
            [
                'client_id.required' => 'Client is required',
                'client_id.exists' => 'Client does not exist',
                'plan.required' => 'Plan is required',
                'plan.exists' => 'Plan does not exist',
                'amount_cents.required' => 'Amount is required',
                'amount_cents.integer' => 'Amount must be an integer',
                
            ]
        );
        $plan_duration = plan::find($request->input('plan'))->duration;
        $payment = new payment();
        $payment->client_id = $request->input('client');
        $payment->plan_id = $request->input('plan');
        $payment->amount_cents = $request->input('amount_cents');
        $payment->merchant_order_id = '0000'; 
        $payment->currency = 'EGP';
        $payment->status = 'success';
        $payment->success = 1;
        $payment->payment_method = 'added by admin';

        $payment->save();

        return redirect()->route('admin.payment.index')->with('success', 'payment created successfully.');
    }

    
    
   
}
