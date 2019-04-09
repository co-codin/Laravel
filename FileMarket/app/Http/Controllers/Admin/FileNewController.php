<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileNewController extends Controller
{
    public function index()
    {
        $files = File::unapproved()->finished()->oldest()->get();

        return view('admin.files.new.index', compact('files'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
