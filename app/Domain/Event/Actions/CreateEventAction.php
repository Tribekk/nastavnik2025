<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateEventAction
{
    public function run(array $data): ?Event
    {
        return DB::transaction(function () use ($data) {
            $event = Event::create([
                'uuid' => Str::uuid(),
                'title' => $data['title'],
                'location' => $data['location'] ?? null,
                'format_id' => $data['format_id'],
                'orgunit_id' => $data['orgunit_id'] ?? auth()->user()->orgunit_id,
                'start_at' => $data['start_at'],
                'finish_at' => $data['finish_at'],
            ]);

            foreach ($data['audience_id'] as $id) {
                $event->audience()->create([
                    'uuid' => Str::uuid(),
                    'audience_id' => $id
                ]);
            }

            foreach ($data['direction_id'] as $id) {
                $event->directions()->create([
                    'uuid' => Str::uuid(),
                    'direction_id' => $id
                ]);
            }

            return $event;
        });
    }
}
