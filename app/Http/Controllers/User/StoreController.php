<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;


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
}
