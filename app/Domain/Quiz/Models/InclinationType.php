<?php

namespace Domain\Quiz\Models;

use Support\Model;

class InclinationType extends Model
{
    protected $guarded = [];

    public function inclination()
    {
        return $this->belongsTo(Inclination::class, "inclination_id");
    }

    /**
     * Возвращает строчное значение промежутка в которое входит значение (кол-во баллов)
     *
     * @param int $value
     * @return string
     */
    public static function takeStringRange(int $value): string
    {
        if($value < 3) $range = "0-2";
        elseif($value < 6) $range = "3-5";
        elseif($value < 10) $range = "6-9";
        else $range = "10-12";

        return $range;
    }
}
