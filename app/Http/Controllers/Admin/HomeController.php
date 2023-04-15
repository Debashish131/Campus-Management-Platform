<?php

namespace App\Http\Controllers\Admin;

use App\Complain;
use App\Http\Controllers\Controller;
use App\Suggestion;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complain = Complain::latest('id')->get();
        $suggestion = Suggestion::latest('id')->get();
        $user = User::all();

        return view('admin.home', compact('complain', 'user', 'suggestion'));
    }

    public function userComplain()
    {
        $complain = Complain::all();
        return view('admin.userComplain', compact('complain'));

    }

    public function userList()
    {
        $user = User::all();
        return view('admin.userList', compact('user'));

    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function profilepic()
    {
        $complain = Complain::all();
        return view('Admin.profileUpdate', compact('complain'));

    }

    public function uploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('admin', $filename, 'public');
            Auth()->user()->update(['image' => $filename]);
        }
        return redirect()->back();

    }
}
