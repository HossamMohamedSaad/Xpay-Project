<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\income_source;
use Illuminate\Http\Request;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = auth()->guard('client')->user()->income_source;

        return view('client.pages.income_source.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('client.pages.income_source.add');
    }

    

    public function create(Request $request)
    {
         $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ],
            [
                'name.required' => 'income source name is required',
                'description.required' => 'income source price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'description.max' => 'Description must not exceed 255 characters',
                'description.string' => 'Description must be a string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $income = new income_source;
        $income->client_id = auth()->guard('client')->user()->id;
        $income->name = $request->name;
        $income->description = $request->description;
        $income->save();
        return redirect()->route('client.income_source.index')->with('success', 'Income source created successfully');
    }

     public function edit($id)
    {
        
        $income = income_source::findOrFail( $id);

        return view('client.pages.income_source.update', compact('income'));
    }
    

    
    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ],
            [
                'name.required' => 'income source name is required',
                'description.required' => 'income source price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'description.max' => 'Description must not exceed 255 characters',
                'description.string' => 'Description must be a string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $income = income_source::findOrFail($request->id);
        $income->client_id = auth()->guard('client')->user()->id;
        $income->name = $request->name;
        $income->description = $request->description;
        
        $income->save();

        return redirect()->route('client.income_source.index')->with('success', 'Account created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = income_source::findOrFail($id);
        $income->delete();

        return redirect()->route('client.income_source.index')->with('success', 'Account deleted successfully');
    }
}
