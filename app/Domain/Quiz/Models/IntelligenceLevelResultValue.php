<?php

namespace Domain\Quiz\Models;

use Support\Model;

class IntelligenceLevelResultValue extends Model
{
    protected $guarded = [];

    public function result()
    {
        return $this->belongsTo(IntelligenceLevelResult::class, "result_id");
    }

    public function type()
    {
        return $this->belongsTo(IntelligenceLevelType::class, "type_id");
    }

    /**
     * Возвращает hex с цветом
     * @return string
     */
    public function hexColor(): string
    {
        if($this->percentage >= 20 && $this->percentage <= 59) return '#385E9D';
        if($this->percentage > 59) return '#33aa33';
        return '#ccc';
    }
}
