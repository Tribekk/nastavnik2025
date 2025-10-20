<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 */
class Answer extends Model
{
    protected $guarded = ['id'];

    public function answerable()
    {
        return $this->morphTo();
    }

    public function question(): belongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'answer_id');
    }

    public function madeByUser($user_id): bool
    {
        return $this
                ->where('id', $this->id)
                ->whereHas('userAnswers', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->count() > 0;
    }

    public function user($user_id): ?UserAnswer
    {
        return UserAnswer::where('user_id', $user_id)
                ->where('answer_id', $this->id)
                ->first();
    }
}
