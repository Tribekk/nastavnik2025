<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Model;

/**
 * @property User user
 * @property int user_id
 * @property FactorMotivesOfChoice values
 */
class FactorMotiveOfChoiceResult extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function factor(): BelongsTo
    {
        return $this->belongsTo(FactorMotivesOfChoice::class, 'factor_id');
    }
}
