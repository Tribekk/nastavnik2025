<?php

namespace Domain\Feedback\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedback";

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
