<?php

namespace Domain\Consultation\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class ConsultationReview extends Model
{
    protected $guarded = ['id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, "consultation_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}

