<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        return view('admin.account-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => 'required|unique:App\Admin',
            'password' => 'required|min:8',
            'con-password' => 'required|min:8',
        ],
        [
            'username.required' => 'Username is required',
            'username.unique' => 'Username is already in use',
            'password.required' => 'Password is required',
            'password.min' => 'Password length should atleast be 8 characters long',
            'con-password.required' => 'Confirm password',
            'con-password.min' => 'Confirm password'
        ]);

        if($request['password']===$request['con-password']){
            $admin = new Admin([
                'username' => $request['username'],
                'password' => Hash::make($request['password'])
            ]);

            $admin->save();

            return redirect('/admin')->with([
                'success' => 'Admin account created',
            ])
        }
        else{
            return redirect()
                ->back()
                 ->with([
                'error' => 'Password does not match'
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function change_username(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:App\Admin'
        ],
        [
            'username.required' => 'Username field empty',
            'username.unique' => 'Username is already taken'
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->username = $request['username'];
        $admin->save();

        return redirect('/admin/account/')->with([
            'success' => 'Username changed'
        ]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
        ],
        [
            'password.required' => 'Password field empty',
            'password.min' => 'Password length should me atleast 8'
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->password = Hash::make($request['password']);
        $admin->save();

        return redirect('/admin/account/')->with([
            'success' => 'Password changed'
        ]);
    }
}
