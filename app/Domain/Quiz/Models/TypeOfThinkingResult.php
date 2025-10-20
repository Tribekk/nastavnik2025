<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Support\Model;

class TypeOfThinkingResult extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(TypeOfThinkingResultValue::class, 'result_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
