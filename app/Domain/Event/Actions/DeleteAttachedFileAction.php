<?php

namespace Domain\Event\Actions;

use Domain\AttachFile\Models\AttachedFile;
use Illuminate\Support\Facades\Storage;

class DeleteAttachedFileAction
{

    public function run($fileId): bool
    {
        $item = AttachedFile::find($fileId);
        if($item) {
            Storage::disk($item->disk)->delete($item->filename);
            return $item->delete();
        }

        return false;
    }
}
