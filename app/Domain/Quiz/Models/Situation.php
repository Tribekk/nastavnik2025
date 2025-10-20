<?php

namespace Domain\Quiz\Models;

use Support\Model;

class Situation extends Model
{
    protected $guarded = [];

    public function situation_interpretations()
    {
        return $this->hasMany(SituationInterpretation::class,'situation_id');
    }

}
