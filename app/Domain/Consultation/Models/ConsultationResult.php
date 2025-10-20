<?php

namespace Domain\Consultation\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationResult extends Model
{
    protected $guarded = ['id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, "consultation_id");
    }

    public function values()
    {
        return $this->hasMany(ConsultationResultValue::class, "result_id");
    }
}

