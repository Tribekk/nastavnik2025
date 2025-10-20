<?php

namespace Domain\Quiz\Models;

use Support\Model;


class LifeMottoAndInterpretation extends Model
{
    protected $table = 'life_mottos_and_interpretations';

    protected $guarded = [];

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
