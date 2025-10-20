<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Support\Model;

/**
 * @property int id
 * @property string uuid
 * @property int user_id
 * @property int reliability
 */
class CharacterTraitResult extends Model
{
    protected $fillable = [
        'uuid',
        'user_id',
        'reliability',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function values()
    {
        return $this->hasMany(CharacterTraitResultValue::class, 'trait_result_id');
    }


    public function getReliabilityPercentageAttribute()
    {
        if($this->reliability <= 5) return 100;
        if($this->reliability == 6) return 90;
        if($this->reliability <= 8) return 80;
        if($this->reliability <= 10) return 70;
        return 0;
    }

    public function getReliabilityDescriptionAttribute()
    {
        $reliability = $this->reliabilityPercentage;

        switch ($reliability) {
            case 100:
                return __('Спасибо за искренние, правдивые ответы, ты максимально ответственно и точно выполнил (а) работу');
            case 90:
                return __('В результатах отмечены противоречивые ответы, но данным можно доверять');
            case 80:
                return __('Результат может быть неточен, возможно, допущена невнимательность');
            default:
                return __('В результатах встречается много неправдивых ответов, лучше пройти тест еще раз');
        }
    }

}
