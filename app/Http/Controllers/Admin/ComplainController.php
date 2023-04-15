<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Complain;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorityNotify;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ComplainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
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
        $user = Admin::where([
            ['name', '=', Auth::user()->name]
        ])->get();
        // Notification::send($user, new AuthorityNotify($complain));
        Toastr::success('Approve complain Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function editComplain($id)
    {
        $complain = Complain::find($id);
        return view('admin.updateComplain', compact('complain'));
    }

    public function updateComplain(Request $request, $id)
    {
        $complain = Complain::find($id);

        $complain->subject = $request->input('subject');
        $complain->email = $request->input('email');
        $complain->date = $request->input('date');
        $complain->problem_type = $request->input('problem_type');
        $complain->describe = $request->input('describe');
        $complain->save();
        Toastr::success('Update Data Successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect('/userComplain');
    }

}
