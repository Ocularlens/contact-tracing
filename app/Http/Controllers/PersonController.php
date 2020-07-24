<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|max:100|min:5',
            'email' => 'required|unique:App\Person,email',
            'contact' => 'required|numeric',
            'password' => 'required|min:8'
        ],
        [
            'name.required' => 'Name is required',
            'name.max' => 'Name must be less than 101 characters',
            'name.min' => 'Name must be 5 letters or more',
            'email.required' => 'E-mail address is required',
            'email.unique' => 'E-mail address is already registered',
            'contact.required' => 'Contact is required',
            'contact.numeric' => 'Contact must be numeric',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be 8 characters long'

        ]);

        $person = new Person([
            'name' => $request['name'],
            'email' => $request['email'],
            'contact' => $request['contact'],
            'password' => Hash::make($request['password'])
        ]);
        $person->save();

        return redirect('login')->with('success','Account Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(person $person)
    {
        //
    }

    public function change_password(Request $request)
    {
        //validate
        $request->validate([
            'old-password' => 'required',
            'new-password' => 'required||min:8',
            'con-new-password' => 'required'
        ],
        [
            'new-password.required' => 'New password is required',
            'old-password.required' => 'Old password is required',
            'con-new-password.required' => 'Confirm the new password',
            'new-password.min' => 'New password must be 8 characters long'
        ]);
        $person =  Auth::user();
        //check if password matches the old one
        if(Hash::check($request['old-password'], $person->password)){
            if($request['new-password'] === $request['con-new-password']){
                $person->password = Hash::make($request['new-password']);
                $person->save();

                return redirect('dashboard');
            }
            else{
                return redirect('dashboard/change-password')->with('error','New password does not match');
            }
        }
        else{
            return redirect('dashboard/change-password')->with('error','Incorrect password');
        }
    }

    public function change_email(Request $request)
    {
        //validation
        $request->validate([
            'old-email' => 'required',
            'new-email' => 'required|unique:App\Person,email'
        ],
        [
            'old-email.required' => 'Old e-mail address is required',
            'new-email.required' => 'New e-mail address is required',
            'new-email.unique' => 'E-mail address is already registered'
        ]);
        $person =  Auth::user();
        //check if new email matches the old email
        if($person->email === $request['old-email']){
            $person->email = $request['new-email'];
            $person->save();

            return redirect('dashboard');
        }
        else{
            return redirect('dashboard/change-email')->with('error','Incorrect old email');
        }
    }

    public function change_contact(Request $request)
    {
        //validation
        $request->validate([
            'old-contact' => 'required',
            'new-contact' => 'required|numeric'
        ],
        [
            'old-contact.required' => 'Old contact is required',
            'new-contact.required' => 'New contact is required',
            'new-contact.numeric' => 'Contact must be numeric'
        ]);
        $person =  Auth::user();
        //check if new email matches the old contact
        if($person->contact === $request['old-contact']){
            $person->contact = $request['new-contact'];
            $person->save();

            return redirect('dashboard');
        }
        else{
            return redirect('dashboard/change-contact')->with('error','Incorrect old contact');
        }
    }
}
