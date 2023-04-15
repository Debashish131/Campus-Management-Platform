<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Notifications\ReportGenerate;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ComplainController extends Controller
{
    public function complainStore(Request $request)
    {
        $complain = new Complain();
        $complain->subject = $request->input('subject');
        $complain->email = $request->input('email');
        $complain->date = $request->input('date');
        $complain->problem_type = $request->input('problem_type');
        $complain->images = $request->input('images');
        $complain->describe = $request->input('describe');
        $complain->creator = Auth::user()->name;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            // dd($request->file('image'));
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('categorypic/', $filename);
            $complain->images = $filename;
        }
        $complain->save();
        $user = User::where([
            ['name', '=', Auth::user()->name]
        ])->get();
//        Notification::send($user, new ReportGenerate($complain));
        Toastr::success('Added Data Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('/complainView');
    }

    public function complainView()
    {
        $complain = complain::where([
            ['creator', '=', Auth::user()->name]
        ])->get();
        return view('user.complainView', compact('complain'));

    }
}
