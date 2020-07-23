<?php

namespace App\Http\Controllers;

use App\Person;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all()->where('store_owner', Auth::user()->person_id);
        return view('dashboard.store')->with([
            'stores' => $stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.store-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20', 
            'description' => 'max:100'
        ]);

        $qrCode = str_replace ('/', '', Hash::make($request["name"]));
        $person_id = Auth::user()->person_id;

        $store = new Store([
            'store_name' => $request['name'],
            'qr_code' => $qrCode,
            'description' => $request['description'],
            'store_owner' => $person_id
        ]);

        $store->save();

        return redirect()->intended('/dashboard/store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
        return view('dashboard.store-edit')->with([
            'store' => $store,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, store $store)
    {
        //
        $request->validate([
            'name' => 'required|max:20', 
            'description' => 'max:100'
        ]);

        $store->store_name = $request['name'];
        $store->description = $request['description'];
        $store->save();
        return redirect('dashboard/store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {
        //
        $store->delete();
        return redirect('dashboard/store');
    }

    //display logs 
    public function logs(store $store)
    {
        return view('dashboard.store-logs')->with([
            'store' => $store
        ]);
    }

    //log visit
    public function log_visit($qrCode)
    {
        $store = Store::where(['qr_code' => $qrCode])->first();
        
        Auth::user()->log_to_store()->attach($store->store_id);

        return redirect('dashboard');
    }
}   
