<?php

namespace Domain\Quiz\Models;

use Support\Model;

/**
 * @property int dividing_score
 * @property string code
 * @property string higher_value
 * @property string lower_value
 * @property mixed lower_description
 * @property mixed higher_description
 */
class CharacterTrait extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }
}
