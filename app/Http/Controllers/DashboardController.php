<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('login');
    }
}
