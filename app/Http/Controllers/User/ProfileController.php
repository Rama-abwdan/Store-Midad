<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function edit()
    {
        return view('user.pages.profile.edit',[
            'user' => Auth::user(),
        ]);
    }
    public function update(ProfileUpdateRequest $request) 
    {
        $user =Auth::user();
        $user->fill($request->safe()->only(['name','email']));
        if($request->filled('password'))
            {
                $user->fill(['password' => Hash::make($request->password)]);
            }
            $user->save();
            return redirect()->route('user.profile.edit')
            ->with('success',__('dashboard.profile_updated'));
            
    }
}
