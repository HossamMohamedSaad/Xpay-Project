<?php

namespace App\Http\Controllers\client;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\subscribtion;
use Illuminate\Http\Request;

class SubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = auth('client')->user();

        if (!$client) {
            return redirect()->route('client.login')->with('error', 'Please login first.');
        }

        $clientId = $client->id;
        $subscriptions = subscribtion::where('client_id', $clientId)->latest()->get();
        return view('client.pages.subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cancel($id)
    {
        $subscription = subscribtion::find($id);
        $subscription->is_cancelled = true;
        $subscription->is_active = false;
        $subscription->save();
        // return redirect()->route('client.subscription.index')->with('success', 'Subscription canceled successfully.');
        Auth::guard('client')->logout();
        return redirect()->route('client.login')->with('success', 'Subscription canceled successfully. Please subscribe again.');

    
    }
}