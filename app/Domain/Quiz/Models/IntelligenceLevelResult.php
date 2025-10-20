<?php

namespace Domain\Quiz\Models;

use Support\Model;

class IntelligenceLevelResult extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(IntelligenceLevelResultValue::class, "result_id");
    }

    public function level()
    {
        return $this->belongsTo(IntelligenceLevel::class, "level_id");
    }

    /**
     * Возвращает hex с цветом
     * @return string
     */
    public function hexColor(): string
    {
        if($this->percentage >= 20 && $this->percentage <= 59) return '#385E9D';
        if($this->percentage > 59) return '#33aa33';
        return '#C1121C';
    }
}
