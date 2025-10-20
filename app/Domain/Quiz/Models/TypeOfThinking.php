<?php

namespace Domain\Quiz\Models;

use Support\Model;

class TypeOfThinking extends Model
{
    protected $table = "type_of_thinking";

    protected $guarded = [];

    public function manifestations()
    {
        return $this->hasMany(TypeOfThinkingManifestation::class, 'type_id');
    }
}
