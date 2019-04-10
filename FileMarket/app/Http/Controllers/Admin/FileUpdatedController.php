<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Files\{FileUpdatesApproved, FileUpdatesRejected};

class FileUpdatedController extends Controller
{
    public function index()
    {
        $files = File::whereHas('approvals')->oldest()->get();

        return view('admin.files.updated.index', compact('files'));
    }

    public function update(File $file)
    {
        $file->mergeApprovalProperties();
        $file->approveAllUploads();
        $file->deleteAllApprovals();

        Mail::to($file->user)->send(new FileUpdatesApproved($file));

        return back()->withSuccess("{$file->title} has been approved");
    }

    public function destroy(File $file)
    {
        $file->deleteAllApprovals();
        $file->deleteUnapprovedUploads();

        Mail::to($file->user)->send(new FileUpdatesRejected($file));
        
        return back()->withSuccess("{$file->title} changes have been rejected.");
    }
}
