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
    $name = $request->input('name');
    $status = $request->input('status');
    
    $query = Store::query();  
    
    if ($name) {
        $query->where('name', 'like', "%$name%");
    }
    
    if ($status) {
        $query->where('status', '=', $status);
    }
    
    $stores = $query->withCount('users')->paginate(10);
    
    return view("dashboard.pages.stores.index", ['stores' => $stores]);
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
    public function edit(Store $store){
        return view("dashboard.pages.stores.edit",['store'=>$store]);
    }
    public function update(Request $request,Store $store){
        $request->validate([
            'name'=>'required|string|max:100',
            'description'=>'nullable|string',
            'logo'=>'nullable|image',
            'status'=>'required|in:active,inactive',
        ]);
        $store->update($request->all());
        return redirect()->route('dashboard.stores.index')->with('success','Store updated successfully');
    }
    public function destroy(Store $store){
        $store->delete();
        return redirect()->route('dashboard.stores.index')->with('success','Store deleted successfully');
    }
}
