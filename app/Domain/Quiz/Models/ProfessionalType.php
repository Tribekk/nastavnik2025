<?php

namespace Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string title
 * @property string area
 * @property int score_min
 * @property int score_max
 * @property string description
 * @property hasMany professions
 * @property hasMany images
 * @property ProfessionalTypeImage activeImage
 * @property ProfessionalTypeImage inActiveImage
 */
class ProfessionalType extends Model
{
    public function professions()
    {
        return $this->hasMany(Profession::class, 'type_id');
    }

    public function images()
    {
        return $this->hasMany(ProfessionalTypeImage::class, 'type_id');
    }

    public function getActiveImageAttribute()
    {
        return $this->images()->where('active', true)->first()->filename;
    }

    public function getInActiveImageAttribute()
    {
        return $this->images()->where('active', false)->first()->filename;
    }
}
