<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Plan;
use App\Models\subscribtion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('subscribtion')->paginate(10);
        $plans = Plan::all();
        return view('admin.pages.client.index', compact('clients', 'plans'));
    }

    
    public function add()
    {
        $plans = Plan::all();
        return view('admin.pages.client.add', compact('plans'));
    }

    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:13',
            'plan' => 'required|exists:plans,id',
            'price_paid' => 'required|integer',
            'payment_method' => 'required|string|max:255',
        ],
            [
                'name.required' => 'Plan name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 6 characters',
                'phone.string' => 'Phone must be a string',
                'phone.max' => 'Phone must not exceed 13 characters',
                'plan.required' => 'Plan is required',
                'plan.exists' => 'Selected plan does not exist',
                'price_paid.required' => 'Price paid is required',
                'price_paid.integer' => 'Price paid must be an integer',
                'payment_method.required' => 'Payment method is required',
                'payment_method.string' => 'Payment method must be a string',
                'payment_method.max' => 'Payment method must not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        DB::beginTransaction();
        try {
            $client = new Client;
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->password = Hash::make($request->input('password'));
            $client->phone = $request->input('phone');
            $client->is_blocked = $request->has('is_blocked') ? 1 : 0;
            $client->save();

            $plan_id = $request->input('plan');
            $plan_duration = Plan::find($plan_id)->duration;
            

            $subscription = new subscribtion;
            $subscription->client_id = $client->id;
            $subscription->plan_id = $request->input('plan');
            $subscription->price_paid = $request->input('price_paid');
            $subscription->payment_method = $request->input('payment_method');
            $subscription->start_date = now();
            $subscription->end_date = now()->addmonths($plan_duration);
            $subscription->save();

            DB::commit();

            return redirect()->route('admin.client.index')->with('success', 'Client created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while creating the client: '.$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        // return $request->all();
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,'.$request->id,
            'phone' => 'nullable|string|max:13',
            'plan' => 'required|exists:plans,id',
            'price_paid' => 'required|integer',
            'payment_method' => 'required|string|max:255',
        ],
            [
                'name.required' => 'Plan name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'email.unique' => 'Email already exists',
                'phone.string' => 'Phone must be a string',
                'phone.max' => 'Phone must not exceed 13 characters',
                'plan.required' => 'Plan is required',
                'plan.exists' => 'Selected plan does not exist',
                'price_paid.required' => 'Price paid is required',
                'price_paid.integer' => 'Price paid must be an integer',
                'payment_method.required' => 'Payment method is required',
                'payment_method.string' => 'Payment method must be a string',
                'payment_method.max' => 'Payment method must not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        DB::beginTransaction();
        try {
            $client = Client::find($request->input('id'));
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->password = Hash::make($request->input('password'));
            $client->phone = $request->input('phone');
            $client->is_blocked = $request->has('is_blocked') ? 1 : 0;
            $client->save();

            $plan_id = $request->input('plan');
            $plan_duration = Plan::find($plan_id)->duration;
            

            $subscription = subscribtion::where('client_id', $client->id)->get()->last();
            $subscription->client_id = $client->id;
            $subscription->plan_id = $request->input('plan');
            $subscription->start_date = now();
            $subscription->end_date = now()->addmonths($plan_duration);
            $subscription->price_paid = $request->input('price_paid');
            $subscription->payment_method = $request->input('payment_method');
            $subscription->save();

            DB::commit();

            return redirect()->route('admin.client.index')->with('success', 'Client created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while creating the client: '.$e->getMessage());
        }  
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $client = Client::find($request->input('id'));
        if ($client) {
            $client->delete();

            return redirect()->route('admin.client.index')->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->route('admin.client.index')->with('error', 'Client not found.');
        }
    }
}
