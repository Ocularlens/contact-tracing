<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function try_get_api()
    {
       
    }
}
