<?php

namespace App\Http\Controllers\Files;

use App\{File, Sale};
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileDownloadController extends Controller
{
    protected $zipper;

    public function __construct(Zipper $zipper)
    {
        $this->zipper = $zipper;
    }

    public function show(File $file, Sale $sale)
    {
        if (!$file->visible()) {
            return abort(403);
        }

        if (!$file->matchesSale($sale)) {
            return abort(403);
        }

        dd($file->getUploadList());
    }
}
