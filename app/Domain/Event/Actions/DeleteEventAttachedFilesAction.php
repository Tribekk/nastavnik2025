<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteEventAttachedFilesAction
{

    public function run(Event $event): void
    {
        $files = $event->attachedFiles;

        DB::transaction(function () use ($files, $event) {
            if($files) {
                foreach ($files as $file) {
                    Storage::disk($file->disk)->delete($file->filename);
                    $file->delete();
                }

                if(count($files)) {
                    Storage::disk($files[0]->disk)->deleteDirectory('events/'.$event->id);
                }
            }
        });
    }
}
