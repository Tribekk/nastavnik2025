<?php

namespace Domain\Quiz\Traits;

trait SelectableImages
{
    public function getSelectedImageAttribute()
    {
        return $this->images()->where('selected', true)->first()->filename;
    }

    public function getNotSelectedImageAttribute()
    {
        return $this->images()->where('selected', false)->first()->filename;
    }
}
