<?php

namespace Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int value
 */
class ProfessionalTypeResultValue extends Model
{
    protected $guarded = [];

    public function getPercentageAttribute()
    {
        return $this->value * 20;
    }

    public function getColorAttribute()
    {
        return $this->value > 1
            ? 'blue'
            : 'grey-light';
    }

    public function type()
    {
        return $this->belongsTo(ProfessionalType::class, "type_id");
    }

    public function professions()
    {
        return $this->hasMany(Profession::class, "type_id", 'type_id');
    }
}
