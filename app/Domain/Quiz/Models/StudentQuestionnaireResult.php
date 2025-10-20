<?php

namespace Domain\Quiz\Models;

use Domain\Quiz\Actions\GetImportantWhenChoosingJob;
use Domain\Quiz\Actions\GetLifeMottosAndInterpretations;
use Domain\Quiz\Actions\GetQuestionnaireAnswerTitle;
use Domain\Quiz\Actions\GetQuestionnaireAnswerTitles;
use Domain\Quiz\Actions\GetValuesMeAndPeople;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Model;

/**
 * @property User user
 * @property int user_id
 * @property StudentQuestionnaireResultValue values
 */
class StudentQuestionnaireResult extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(StudentQuestionnaireResultValue::class, 'result_id', 'id');
    }

    public function getValuesMeAndPeopleAttribute(): array
    {
        $action = new GetValuesMeAndPeople();
        return $action->run($this);
    }

    public function getLifeMottosAndInterpretationsAttribute(): array
    {
        $action = new GetLifeMottosAndInterpretations();
        return $action->run($this);
    }

    public function getImportantWhenChoosingJobAttribute(): array
    {
        $action = new GetImportantWhenChoosingJob();
        return $action->run($this);
    }

    public function getReceiveOffersFromTheEmployerAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Тебе интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках?");
    }

    public function getConcludingContractTargetedTrainingAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Как ты относишься к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?");
    }

    public function getSuitsMeBetterAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Что тебе больше подходит?");
    }

    public function getPerfectFutureAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Какое будущее видишь для себя идеальным? Выбери 2 варианта:");
    }

    public function getHobbiesAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Чем увлекаешься?");
    }

    public function getLessonsWithTutorAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Занимаешься чем-то еще, дополнительно или с репетитором?");
    }

    public function getHowLongHaveHobbiesAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Какой секцией занимаешься самое продолжительное время - укажи сколько лет");
    }

    public function getWhoseChoiceHobbiesAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        $whoseChoice = $action->run($this, "Эта секция - твой выбор?");
        if($whoseChoice === "Да, мой выбор") {
            return "по своему желанию";
        } else if($whoseChoice === "Нет, родители заставляют") {
            return "по желанию родителей";
        }

        return $whoseChoice;
    }

    public function getLimitingHealthFeaturesAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "У тебя есть особенности здоровья, ограничивающие поступление на желаемые специальности? Укажи, в каких сферах");
    }

    public function getWorkExperienceAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "У тебя есть опыт трудовой деятельность?");
    }

    public function getChosenExamsAttribute(): string
    {
        $question = Question::where('content', "Определился с экзаменами для ЕГЭ?")
            ->firstOrFail();

        $value = $this->values()->where('question_id', $question->id)->firstOrFail();

        if($value->answer->title == "Да") {
            $action = new GetQuestionnaireAnswerTitles();
            $exams = $action->run($this, "Какие будешь сдавать экзамены?");
        }

        if(!isset($exams) || !count($exams)) return 'Не определены';

        return "Определены: " . implode(", ", $exams);
    }

    public function getFavoriteSubjectsAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Твои любимые предметы в школе...");
    }

    public function getAvgMarkAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Какой у тебя средний балл?");
    }

    public function getPersonalQualitiesAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Какими качествами себя охарактеризуешь? Выбери 7 основных");
    }

    public function getThemeMyBlogAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Если бы тебе предложили вести блог в интернете, на какую тему подготовишь материал для своих подписчиков?");
    }

    public function getAboutMeAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Какие из этих утверждений про тебя?");
    }

    public function getWillSpendMillionOnAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Если бы у тебя был миллион, как им распорядишься?");
    }

    public function getWhoDoWantToWorkAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Кем ты хочешь работать? (Если уже знаешь, если нет - не пиши).");
    }

    public function getWhoDontWantToWorkAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Кем ты точно не станешь работать?");
    }

    public function getWhyWhoDontWantToWorkAttribute(): string
    {
        $action = new GetQuestionnaireAnswerTitle();
        return $action->run($this, "Почему?");
    }

    public function getChancesOfStayingHometownAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitle();
        $chance = $action->run($this, "Какова вероятность, что ты останешься строить карьеру (любую) в родном городе");

        return ['value' => intval($chance), 'progress' => 10 * intval($chance)];
    }

    public function getFactorsChoseJobAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Выдели определяющие факторы в выборе специальности?");
    }

    public function getDominationValuesAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Укажите 3-5 главенствующих ценностей в семье");
    }

    public function getMotiveOfChoiceAttribute(): array
    {
        $action = new GetQuestionnaireAnswerTitles();
        return $action->run($this, "Что тебе важно иметь в будущей деятельности? Выбери 7 главных ценностей, что направят твой выбор:");
    }
}
