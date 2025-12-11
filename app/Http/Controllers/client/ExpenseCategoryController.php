<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\expense_category;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = auth()->guard('client')->user()->expense_category;

        return view('client.pages.expense_category.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('client.pages.expense_category.add');
    }

    

    public function create(Request $request)
    {
         $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ],
            [
                'name.required' => 'expense source name is required',
                'description.required' => 'expense source price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'description.max' => 'Description must not exceed 255 characters',
                'description.string' => 'Description must be a string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $expense = new expense_category;
        $expense->client_id = auth()->guard('client')->user()->id;
        $expense->name = $request->name;
        $expense->description = $request->description;
        $expense->save();
        return redirect()->route('client.expense_category.index')->with('success', 'category created successfully');
    }

     public function edit($id)
    {
        
        $income = expense_category::findOrFail( $id);

        return view('client.pages.expense_category.update', compact('income'));
    }
    

    
    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ],
            [
                'name.required' => 'expense source name is required',
                'description.required' => 'expense source price is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not exceed 255 characters',
                'description.max' => 'Description must not exceed 255 characters',
                'description.string' => 'Description must be a string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        $expense = expense_category::findOrFail($request->id);
        $expense->client_id = auth()->guard('client')->user()->id;
        $expense->name = $request->name;
        $expense->description = $request->description;
        
        $expense->save();

        return redirect()->route('client.expense_category.index')->with('success', 'category created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = expense_category::findOrFail($id);
        $income->delete();

        return redirect()->route('client.expense_category.index')->with('success', 'category deleted successfully');
    }
}
