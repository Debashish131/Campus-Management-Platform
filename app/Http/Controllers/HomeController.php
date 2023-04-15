<?php

namespace App\Http\Controllers;

use App\Complain;
use App\PDF;
use App\Suggestion;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $complain = Complain::where([['creator', '=', Auth::user()->name]])->latest('id')->get();
        $user = User::all();
        $suggestion = Suggestion::where([['creator', '=', Auth::user()->name]])->latest('id')->get();
        $pdf = PDF::latest('id')->get();
        return view('home', compact('complain', 'user', 'suggestion', 'pdf'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/");
    }

    public function profile()
    {
        $user = User::where([
            ['name', '=', Auth::user()->name]
        ])->latest('id')->get();
        return view('user.profile', compact('user'));

    }

    public function complainForm()
    {

        return view('user.complain');

    }

    public function noticePDF()
    {
        $pdf = PDF::latest('id')->get();
        return view('user.notice', compact('pdf'));

    }


    public function useruploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('user', $filename, 'public');
            Auth()->user()->update(['image' => $filename]);
        }
        return redirect()->back();

    }
}
