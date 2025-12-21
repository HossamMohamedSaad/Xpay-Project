<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('authclient.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate("client");
        
        $request->session()->regenerate();

        $is_blocked_client = Auth::guard('client')->user()->is_blocked;
        if($is_blocked_client){
            Auth::guard('client')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('client.login');
        }
        $sub_client = Auth::guard('client')->user()->subscribtion()->where('is_active', true)?->first();
        if ($sub_client) {
            

            return redirect()->route('client.dashboard.index');
        }
        else
        {
            Auth::guard('client')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('client.plan.index');
        }
        
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
         Auth::guard('client')->logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        return redirect()->route('client.login');
    }
}
