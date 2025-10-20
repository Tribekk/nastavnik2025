<?php

namespace App\Summernote\Controllers;

use App\Summernote\Actions\StoreUploadFile;
use App\Summernote\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use Support\Controller;

class SummernoteController extends Controller
{
    public function upload(UploadRequest $request, StoreUploadFile $action)
    {
        $image = $action->run($request->file('file'));
        $url = Storage::disk($image->disk)->url($image->filename);
        return response()->json(['url' => $url]);
    }
}
