<?php

namespace Domain\Event\Actions;

use Transliterate;
use Domain\Event\Models\Event;
use Domain\Event\States\Event\EventState;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\ModelStates\Exceptions\CouldNotPerformTransition;

class UpdateEventAction
{
    /**
     * @param Event $event
     * @param array $data
     * @param array|null $attachedFiles
     * @return bool
     */
    public function run(Event $event, array $data, ?array $attachedFiles = null): bool
    {
        return DB::transaction(function () use ($event, $data, $attachedFiles) {
            if($data['state']) {
                try {
                    if(!$event->state->is(EventState::resolveStateClass($data['state']))) {
                        $event->transitionTo(EventState::resolveStateClass($data['state']));
                    }
                } catch (CouldNotPerformTransition $exception) {
                    Log::error($exception->getMessage());
                }
            }

            $result = $event->update([
                'uuid' => Str::uuid(),
                'title' => $data['title'],
                'format_id' => $data['format_id'],
                'orgunit_id' => $data['orgunit_id'] ?? auth()->user()->orgunit_id,
                'start_at' => $data['start_at'],
                'finish_at' => $data['finish_at'],
                'location' => $data['location'],
                'program' => $data['program'] ?? null,
            ]);

            $event->audience()->delete();
            foreach ($data['audience_id'] as $id) {
                $event->audience()->create([
                    'uuid' => Str::uuid(),
                    'audience_id' => $id
                ]);
            }

            $event->directions()->delete();
            foreach ($data['direction_id'] as $id) {
                $event->directions()->create([
                    'uuid' => Str::uuid(),
                    'direction_id' => $id
                ]);
            }

            if($attachedFiles) {
                foreach ($attachedFiles as $attachedFile) {
                    $dirName = uniqid();
                    $filename = $attachedFile->getClientOriginalName();
                    $filename = str_replace(' ', '_', Transliterate::make($filename));
                    $path = '/events/'.$event->id.'/'.$dirName.'/'.$filename;
                    $attachedFile->storeAs('attached_files', $path);

                    $event->attachedFiles()->create([
                        'uuid' => Str::uuid(),
                        'filename' => $path,
                        'disk' => 'attached_files',
                    ]);
                }
            }

            return $result;
        });
    }
}
