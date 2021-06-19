<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        return \view('profile');
    }


    public function profileUpdate(Request $request){

        $data = $request->only(['name', 'phone', 'email']);
        $user = Auth::user();
        $user->update($data);
        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }

    public function passwordUpdate(PasswordRequest $request){
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }
}
