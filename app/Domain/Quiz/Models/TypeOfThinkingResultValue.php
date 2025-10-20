<?php

namespace Domain\Quiz\Models;

use Support\Model;

class TypeOfThinkingResultValue extends Model
{
    protected $guarded = [];

    public function result()
    {
        return $this->belongsTo(TypeOfThinkingResult::class, 'result_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeOfThinking::class, "type_id");
    }

    public function manifestation()
    {
        return $this->belongsTo(TypeOfThinkingManifestation::class, "manifestation_id");
    }

    /**
     * Возвращает hex с цветом
     * @return string
     */
    public function hexColor(): string
    {
        if ($this->percentage <= 34) return '#FF0000';
        if (34 < $this->percentage && $this->percentage <= 70) return "#FFD966";

        return '#548235';
    }
}
