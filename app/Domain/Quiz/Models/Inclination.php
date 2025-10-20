<?php

namespace Domain\Quiz\Models;

use Support\Model;

class Inclination extends Model
{
    protected $guarded = [];

    public function types()
    {
        return $this->hasMany(InclinationType::class, 'inclination_id');
    }
}
