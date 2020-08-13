<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    //protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
  
    public function login(Request $request)
    {   
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        }
        else{
            return redirect('login')->with('error','Account Does Not Exist');
        }
    }

    public function showAdminLoginForm()
    {
        return view('admin.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('admin');
        }
        return redirect('admin/login')->with('error','Account Does Not Exist');
    }
}
