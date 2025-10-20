<?php

namespace Domain\Quiz\Models;

use Support\Model;

class SituationInterpretation extends Model
{
    protected $guarded = [];

    public function situation()
    {
        return $this->belongsTo(Situation::class, "situation_id");
    }
}
