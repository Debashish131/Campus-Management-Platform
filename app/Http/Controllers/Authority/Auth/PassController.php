<?php

namespace App\Http\Controllers\Authority\Auth;

use App\Admin;
use App\Authority;
use App\Complain;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:authority');
    }

    public function AuthPass()
    {
        $complain = Complain::all();
        return view('authority.authPass', compact('complain'));

    }

    public function PassAuth(Request $request)

    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        Authority::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Toastr::success('Password Change Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }
}
