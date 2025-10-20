<?php

namespace Domain\Quiz\Models;

use Domain\Quiz\Actions\GetQuestionnaireAnswerTitle;
use Domain\Quiz\Actions\GetQuestionnaireAnswerTitles;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Model;

/**
 * @property User user
 * @property int user_id
 * @property ParentQuestionnaireResultValue values
 */
class ParentQuestionnaireResult extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(ParentQuestionnaireResultValue::class, 'result_id', 'id');
    }

    public function getDominationValuesAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Укажите 3-5 главенствующих ценностей в Вашей семье");
    }

    public function getImagineFeatureAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Какое будущее Вы видите идеальным для ребенка?");
    }

    public function getProbabilityWillRemainAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе");
    }

    public function getFactorsChoseJobAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Выделите не более 3-х определяющих факторов в выборе специальности?");
    }

    public function getTargetedTrainingAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Как Вы относитесь к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?");
    }

    public function getReceivingProposalsForEventsAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Вам интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, страховках?");
    }
}
