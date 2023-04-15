<?php

namespace App\Http\Controllers;

use App\User;
use App\Rules\UserPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserpassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userpasswordChange(Request $request)

    {
        $request->validate([
            'current_password' => ['required', new UserPassword()],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Toastr::success('Password Change Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }
}
