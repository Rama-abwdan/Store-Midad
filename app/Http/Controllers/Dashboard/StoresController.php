<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
class StoresController extends Controller
{
    public function index()
    {
        $request = request();
        $query = $request->input('query');
        $name = $request->input('name');
        $status = $request->input('status');
        if($name){
            $query->where('name','like',"%$name%");
        }
        if($status){
            $query->where('status','=',$status);
        }
        return view("dashboard.pages.stores.index",['stores'=>$query->paginate(10)]);
    }
    public function create(){
        $store = new Store();
        return view("dashboard.pages.stores.create",['store'=>$store]);

    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:100',
            'description'=>'nullable|string',
            'logo'=>'nullable|image',
            'status'=>'required|in:active,inactive',
        ]);
        Store::create($request->all());
        return redirect()->route('dashboard.stores.index')->with('success','Store created successfully');
    }
    public function show(Store $store){
        return view("dashboard.pages.stores.show",['store'=>$store]);
    }
}
