<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('authclient.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
         $client = client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "phone" => $request->phone,
            'is_blocked' => 0,
        ]);

        // event(new Registered($client));

        Auth::guard('client')->login($client);

        return redirect(route('client.account.index', absolute: false));
    }
}
