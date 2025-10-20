<?php

namespace Domain\Consultation\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationResultValue extends Model
{
    protected $guarded = ['id'];

    public function result()
    {
        return $this->belongsTo(ConsultationResult::class, "result_id");
    }

    public function type()
    {
        return $this->belongsTo(ConsultationResultType::class, "type_id");
    }
}

