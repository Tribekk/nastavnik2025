<?php

namespace App\AttachFile\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachFileController
{
    public function download(Request $request)
    {
        try {
            return Storage::download($request->input('path'));
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
