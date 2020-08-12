<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\Store;

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

    public function delete_user($id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect('admin/users');
    }

    public function delete_store($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect('admin/stores');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function admins()
    {
        $admins = DB::table('admins')
            ->where('id', '<>', Auth::guard('admin')->user()->id)
            ->get();
        return view('admin.admins')->with([
            'admins' => $admins
        ]);
    }
}
