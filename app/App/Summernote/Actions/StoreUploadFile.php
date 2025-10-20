<?php


namespace App\Summernote\Actions;


use Domain\Image\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreUploadFile
{
    public function run(UploadedFile $file): ?Image
    {
        DB::transaction(function () use ($file, &$image) {
            $filename = $file->storeAs('/', uniqid().".".$file->getClientOriginalExtension(), 'editor');

            $image = Image::create([
                'uuid' => Str::uuid(),
                'filename' => $filename,
                'disk' => 'editor',
                'imageable_type' => 'Summernote',
                'imageable_id' => 0,
            ]);
        });

        return $image;
    }
}
