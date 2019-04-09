<?php

namespace App\Http\Controllers\Account;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFileRequest;

class FileController extends Controller
{
    public function index()
    {
        $files = auth()->user()->files()->latest()->finished()->get();
        
        return view('account.files.index', [
            'files' => $files
        ]);
    }

    public function create(File $file)
    {
        if (!$file->exists) {
            $file = $this->createAndReturnSkeletonFile();

            return redirect()->route('account.files.create', $file);
        }

        $this->authorize('touch', $file);

        return view('account.files.create', [
            'file' => $file
        ]);
    }

    public function store(File $file, StoreFileRequest $request)
    {
        $this->authorize('touch', $file);

        $file->fill($request->only(['title', 'overview', 'overview_short', 'price']));
        $file->finished = true;
        $file->save();

        return redirect()->route('account.files.index')
                         ->withSuccess('Thanks, submitted for review.');
    }

    protected function createAndReturnSkeletonFile()
    {
        return auth()->user()->files()->create([
            'title' => 'Untitled',
            'overview' => 'None',
            'overview_short' => 'None',
            'price' => 0,
            'finished' => false,
        ]);
    }
}
