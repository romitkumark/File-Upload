<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function upload(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,txt,docx,xml,csv|max:500000',
        ]);
        
        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {

            $fileModel = new File;
            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->path = '/public/files';
            $fileModel->save();
            $request->file->store('public/files');

            $to_email = 'romit@yopmail.com';
            \Mail::to($to_email)->send(new \App\Mail\NotifyMail());
            return redirect('file-upload')->with('status', 'File has been uploaded successfully.');
        }
    }
}
