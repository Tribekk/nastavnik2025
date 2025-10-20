<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Support\Model;

class InclinationResult extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(InclinationResultValue::class, 'result_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
