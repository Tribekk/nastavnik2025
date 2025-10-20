<?php

namespace Domain\Quiz\Models;

use Support\Model;

class InclinationResultValue extends Model
{
    protected $guarded = [];

    public function result()
    {
        return $this->belongsTo(InclinationResult::class, 'result_id');
    }

    public function type()
    {
        return $this->belongsTo(InclinationType::class, "type_id");
    }

    public function inclination()
    {
        return $this->belongsTo(Inclination::class, 'inclination_id');
    }

    /**
     * Возвращает hex с цветом
     * @return string
     */
    public function hexColor(): string
    {
        if($this->is_higher) return '#20ae40';
        if($this->value > 3) return '#912F46';
        return '#d19cef';
    }
}
