<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Plan;
use App\Models\Subscribtion;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $subscriptions = Subscribtion::all();
        $plans = Plan::all();

        $clients_count = $clients->count()??0;
        $clients_blocked = $clients->where('is_blocked', 1)->count();
        $totalClientsWithSubscription = Client::whereHas('subscribtion')->count();

        $plans_count= $plans->count();
        $plans_visible= $plans->where('is_visible', 1)->count();

        $subscription_count = $subscriptions->count();
        $subscription_active = $subscriptions->where('is_active', 1)->count();
        $subscription_cash = $subscriptions->sum('price_paid');

    
        return view('admin.pages.dashboard.index' , compact('clients_count', 'clients_blocked',  'totalClientsWithSubscription' , 'plans_count', 'plans_visible', 'subscription_count', 'subscription_active', 'subscription_cash'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
