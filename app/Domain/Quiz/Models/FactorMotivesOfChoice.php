<?php

namespace Domain\Quiz\Models;

use Support\Model;


class FactorMotivesOfChoice extends Model
{
    protected $table = 'factors_motives_of_choice';

    protected $guarded = [];

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
