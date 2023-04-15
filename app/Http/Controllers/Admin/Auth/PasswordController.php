<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Complain;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function password()
    {
        $complain = Complain::all();
        return view('admin.password', compact('complain'));

    }

    public function store(Request $request)

    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        Admin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Toastr::success('Password Change Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }
}
