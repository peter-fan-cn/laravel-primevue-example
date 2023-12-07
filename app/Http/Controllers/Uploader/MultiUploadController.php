<?php

namespace App\Http\Controllers\Uploader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultiUploadController extends Controller
{
    public function index()
    {
        return inertia('MultiUploadPage', [
            'token' => csrf_token(),
        ]);
    }

    public function store(Request $request)
    {
        $files = $request->file('file');

        return count($files);
    }
}
