<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    
    public function index()
    {
        $users= user::all();

        return view('admin.pages.user.index', compact('users'));
    }

    
    public function add()
    {
        return view('admin.pages.user.add');
    }
    public function create(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:13',
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

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
         DB::beginTransaction();
        try {
            $user = new user;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->save();

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'user created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while creating the user: '.$e->getMessage());
        }
    }

    

    
    

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'phone' => 'nullable|string|max:13',
        ],
            [
                'name.required' => 'Plan name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'email.unique' => 'Email already exists',
                'phone.string' => 'Phone must be a string',
                'phone.max' => 'Phone must not exceed 13 characters',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }
         DB::beginTransaction();
        try {
            $user = user::find($request->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->save();

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'user updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while updating the user: '.$e->getMessage());
        }
        
    }

   
    public function destroy(Request $request)
    {
        $user = user::find($request->input('id'));
        if ($user) {
            $user->delete();    
            return redirect()->route('admin.user.index')->with('success', 'user deleted successfully.');
        } else {
            return redirect()->route('admin.user.index')->with('error', 'user not found.');
        }
        
    }
}
