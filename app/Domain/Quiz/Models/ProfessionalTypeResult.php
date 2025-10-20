<?php

namespace Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int reliability
 * @property int reliabilityPercentage
 * @property hasMany values
 */
class ProfessionalTypeResult extends Model
{
    protected $guarded = [];

    protected $with = ['values'];

    public function values()
    {
        return $this->hasMany(ProfessionalTypeResultValue::class, 'result_id');
    }

    public function value(ProfessionalType $type)
    {
        return $this->values->where('type_id', $type->id)->first()->value ?? 0;
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
