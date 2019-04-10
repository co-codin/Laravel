<?php

namespace App\Http\Controllers\Files;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function show(File $file)
    {
        if (!$file->visible()) {
            return abort(404);
        }
        
        return view('files.show', [
            'file' => $file,
            'uploads' => $file->uploads()->approved()->get()
        ]);
    }
}
