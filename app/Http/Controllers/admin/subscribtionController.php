<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subscribtion;
use App\Models\client;
use App\Models\plan;

class subscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = subscribtion::all();
        return view('admin.pages.subscribtion.index' , compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $clients = client::all();
        $plans = plan::all();
        return view('admin.pages.subscribtion.add', compact('clients', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
$validator = validator()->make($request->all(), [
            'client_id' => 'required|exists:clients,id',
            'plan' => 'required|exists:plans,id',
            'price_paid' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            
        ],
            [
                'client_id.required' => 'Client is required',
                'client_id.exists' => 'Selected client does not exist',
                'plan.required' => 'Plan is required',
                'plan.exists' => 'Selected plan does not exist',
                'price_paid.required' => 'Price paid is required',
                'price_paid.integer' => 'Price paid must be an integer',
                'payment_method.required' => 'Payment method is required',
                'payment_method.string' => 'Payment method must be a string',
                'payment_method.max' => 'Payment method must not exceed 255 characters', 
            ]
        );
        $plan_duration = plan::find($request->input('plan'))->duration;
        $subscription = new subscribtion();
        $subscription->client_id = $request->input('client');
        $subscription->plan_id = $request->input('plan');
        $subscription->price_paid = $request->input('price_paid');
        $subscription->payment_method = $request->input('payment_method');

        $subscription->start_date = now();
        $subscription->end_date = now()->addmonths($plan_duration);
        $subscription->is_active =$request->has('is_active') ? 1 : 0;
        $subscription->save();

        return redirect()->route('admin.subscribtion.index')->with('success', 'Subscription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
