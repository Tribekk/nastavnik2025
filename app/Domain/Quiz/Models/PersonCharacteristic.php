<?php

namespace Domain\Quiz\Models;

use Support\Model;


class PersonCharacteristic extends Model
{
    protected $guarded = [];

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
