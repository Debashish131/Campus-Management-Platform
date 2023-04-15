<?php

namespace App\Http\Controllers\Admin;

use App\Complain;
use App\Http\Controllers\Controller;
use App\PDF;
use App\Suggestion;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function notice()
    {
        $suggestion = Suggestion::all();
        $complain = Complain::latest('id')->get();
        $pdf = PDF::all();
        return view('Admin.notice.pdfupload', compact('suggestion', 'complain', 'pdf'));

    }

    public function fileUploadPost(Request $request)

    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $pdf = new PDF;

        $pdf->name = $request->name;
        $pdf->department = $request->department;
        $pdf->type = $request->type;
        $pdf->file = $request->input('file');
        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move(public_path('uploads'), $fileName);
            $pdf->file = $fileName;
        }
        $pdf->save();
        return redirect('/pdfview');

    }

    public function Pdfview()
    {

        $pdf = PDF::all();
        return view('admin.notice.noticeboard', compact('pdf'));

    }


}
