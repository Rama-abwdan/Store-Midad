<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index(){
        $stats = [
            'products_count' => Product::count(),
            'categories_count' => Category::count(),
            'stores_count' => Store::count(),
            'users_count' =>User::count(),
        ];
        return view("dashboard.pages.index",compact('stats'));
    }

}
