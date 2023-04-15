<?php

namespace App\Http\Controllers\Admin;

use App\Complain;
use App\Http\Controllers\Controller;
use App\Suggestion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userSuggestion()
    {
        $suggestion = Suggestion::all();
        $complain = Complain::latest('id')->get();
        return view('admin.Suggestion.userSuggestion', compact('suggestion','complain'));

    }

    public function approveSuggestion(Request $request, $id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->Is_approved = '1';
        $suggestion->save($request->all());
        Toastr::success('Approve suggestion Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function admineditSuggestion($id)
    {
        $suggestion = Suggestion::find($id);
        $complain = Complain::latest('id')->get();
        return view('admin.Suggestion.updateSuggestion', compact('suggestion','complain'));
    }

    public function adminUpdateSuggestion(Request $request, $id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->topic = $request->input('topic');
        $suggestion->email = $request->input('email');
        $suggestion->describe = $request->input('describe');
        $suggestion->save();
        Toastr::success('Update Data Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('/userSuggestion');
    }


    public function adminDeleteSuggestion($id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->delete();
        Toastr::error('Delete Suggestion Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
