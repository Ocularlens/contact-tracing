<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $logs = DB::table('person_store')
            ->join('people', 'person_store.person_id', '=', 'people.person_id')
            ->get();
        return view('admin.index')->with([
            'logs' => $logs
        ]);
    }

    public function users()
    {
        $users = DB::table('people')->get();
        
        return view('admin.users')->with([
            'users' => $users,
        ]);
    }

    public function stores()
    {
        $stores = DB::table('stores')->get();

        return view('admin.stores')->with([
            'stores' => $stores
        ]);
    }
}
