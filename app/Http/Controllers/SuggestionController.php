<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Suggestion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{

    public function suggestionForm()
    {

        return view('user.Suggestion.suggestion');

    }

    public function suggestionStore(Request $request)
    {
        $suggestion = new Suggestion();
        $suggestion->topic = $request->input('topic');
        $suggestion->email = $request->input('email');
        $suggestion->describe = $request->input('describe');
        $suggestion->creator = Auth::user()->name;
        $suggestion->save();
        Toastr::success('Add Suggestion Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('/suggestionView');

    }

    public function suggestionView()
    {

        $suggestion = Suggestion::latest('id')->where([
            ['creator', '=', Auth::user()->name]
        ])->get();
        return view('user.Suggestion.suggestionView', compact('suggestion'));

    }

    public function editSuggestion($id)
    {
        $suggestion = Suggestion::find($id);
        return view('user.Suggestion.suggestionUpdate', compact('suggestion'));
    }

    public function suggestionUpdate(Request $request, $id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->topic = $request->input('topic');
        $suggestion->email = $request->input('email');
        $suggestion->describe = $request->input('describe');
        $suggestion->save();
        Toastr::success('Update Data Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('/suggestionView');
    }

    public function deleteSuggestion($id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->delete();
        Toastr::error('Delete Data Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }


}
