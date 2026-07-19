<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactoreAuthenticationController extends Controller
{
    //
    public function index(){
        $user = Auth::guard('web')->user();
        return view('user.pages.two-factor-auth',compact('user'));
    }
}
