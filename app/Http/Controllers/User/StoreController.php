<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\User;


class StoreController extends Controller
{
    //
    public function create(){
        if(Auth::user()->hasStore()){
        return redirect()->route('user.store.edit');
    }

    $store = new Store();
    return view('user.pages.store.create',compact('store'));
    }

    public function store(Request $request){
        $user=Auth::user();
        if(Auth::user()->hasStore()){
            return redirect()->route('user.store.edit');
        }

        $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $store = new Store();
        $store->name = $request->name;
        $store->description = $request->description;
        $store->status = $request->status;
        $store->save();
        $user->update(['store_id' => $store->id]);

        return redirect()->route('user.dashboard')->with('success', 'Store created successfully.');
    }

    public function edit(){
        $store = Auth::user()->store;
        return view('user.pages.store.edit',compact('store'));
    }

    public function update(Request $request){
        $store = Auth::user()->store;

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $store->name = $request->name;
        $store->description = $request->description;
        $store->status = $request->status;
        $store->save();

        return redirect()->route('user.store.edit')->with('success', 'Store updated successfully.');
    }
}
