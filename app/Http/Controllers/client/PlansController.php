<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('client.pages.plan.index' , compact('plans'));
    }
}
