<?php

namespace App\Http\Controllers\Authority;

use App\Complain;
use App\Http\Controllers\Controller;
use App\Suggestion;
use App\User;
use App\Authority;
use Brian2694\Toastr\Facades\Toastr;
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
        $this->middleware('auth:authority');
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
        return view('authority.home', compact('complain', 'user', 'suggestion'));
    }

    public function userComplain()
    {
        $complain = Complain::all();
        return view('authority.userComplain', compact('complain'));

    }

    public function deleteComplain($id)
    {
        $complain = Complain::find($id);
        $complain->delete();
        return back();
    }

    public function approveComplain(Request $request, $id)
    {
        $complain = Complain::findOrFail($id);
        $complain->Is_approved = '1';
        $complain->save($request->all());
        Toastr::success('Approve complain Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function userSuggestion()
    {
        $suggestion = Suggestion::all();
        $complain = Complain::latest('id')->get();
        return view('authority.userSuggestion', compact('suggestion', 'complain'));

    }

    public function approveSuggestion(Request $request, $id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->Is_approved = '1';
        $suggestion->save($request->all());
        Toastr::success('Approve suggestion Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function authDeleteSuggestion($id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->delete();
        Toastr::error('Delete Suggestion Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function authlogout(Request $request)
    {
//        $this->guard()->logout();
//
//        $request->session()->invalidate();
//
//        return redirect()->route('authority.login');

        $request->session()->flush();
        return redirect("/authority");
    }

    public function Authprofilepic()
    {
        $complain = Complain::all();
        return view('Authority.authProfile', compact('complain'));

    }

    public function upAuth(Request $request)
    {

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('authority', $filename, 'public');
            Auth()->user()->update(['image' => $filename]);
        }
        return redirect()->back();

    }
}
