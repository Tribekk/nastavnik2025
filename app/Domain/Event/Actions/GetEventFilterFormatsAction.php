<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventFormat;

class GetEventFilterFormatsAction
{
    public function run(): array
    {
        $result = [['value' => 'all', 'title' => 'Показывать все']];
        $formats = EventFormat::all();
        if($formats) {
            foreach ($formats as $format) {
                $result[] = ['value' => $format->id, 'title' => $format->title];
            }
        }

        return $result;
    }
}
