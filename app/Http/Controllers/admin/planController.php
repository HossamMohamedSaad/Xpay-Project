<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\plan;
use Illuminate\Http\Request;

class planController extends Controller
{
    public function index()
    {
        $plans = plan::all();

        return view('admin.pages.plan.index', compact('plans'));
    }

    public function add()
    {
        return view('admin.pages.plan.add');
    }

    public function create(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'discount_price' => 'nullable|integer',
            'duration' => 'required|integer',
            'description' => 'string',

        ],
            [
                'name.required' => 'Plan name is required',
                'price.required' => 'Plan price is required',
                'duration.required' => 'Plan duration is required',
                'description.string' => 'Description must be a string',
                'price.integer' => 'Price must be a number',
                'discount_price.integer' => 'Discount price must be a number',
                'duration.integer' => 'Duration must be an integer',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $plan = new plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->discount_price = $request->discount_price;
        $plan->description = $request->description;
        $plan->duration = $request->duration;
        $plan->is_visible = $request->has('is_visible') ? true : false;
        $plan->save();

        return redirect()->route('admin.plan.index')->with('success', 'Plan created successfully.');

    }

    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'discount_price' => 'nullable|integer',
            'duration' => 'required|integer',
            'description' => 'string',

        ],
            [
                'name.required' => 'Plan name is required',
                'price.required' => 'Plan price is required',
                'duration.required' => 'Plan duration is required',
                'description.string' => 'Description must be a string',
                'price.integer' => 'Price must be a number',
                'discount_price.integer' => 'Discount price must be a number',
                'duration.integer' => 'Duration must be an integer',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
        $plan = plan::find($request->id);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->discount_price = $request->discount_price;
        $plan->description = $request->description;
        $plan->duration = $request->duration;
        $plan->is_visible = $request->has('is_visible') ? true : false;
        $plan->save();

        return redirect()->route('admin.plan.index')->with('success', 'Plan created successfully.');

    }

    public function destroy(Request $request)
    {
        $plan = plan::find($request->id);
        $plan->delete();

        return redirect()->route('admin.plan.index')->with('success', 'Plan deleted successfully.');
    }
}
