<?php

namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Log;

class CalculateIntelligenceLevelValues
{
    /**
     * Массив (key => value) с верными ответами на вопросы.
     * Key - номер вопроса. Начинается с 0.
     * Value - верный ответ (value из answers). Если ответов несколько - массив с ответами.
     * @var array
     */
    protected array $correctAnswers = [
        3, // мягкий
        4, // слушать
        4, // зубы
        40, // кол-во автомобилей
        4, // 4 пары
        31, // число в прогрессии
        14, // кол-во соток
        1, // схожи
        800, // кол-во выстрелов для поражения целей все 100 раз
        "1/10", // число
        [4,5], // две пословицы со схожим смыслом
        1, // схожи
        3, // фигура, наиболее отличная от других
        [1,4], // одинаковые кубы. развертки
        17, // кол-во страниц напечатанных меньшим шрифтом
        3, // процент пирога на тарелке
        3, // энергия
        6, // дополнение рисунка
        5, // дополнение рисунка
        4, // кол-во линий
        2, // минуты
        3, // наименьшее кол-во поездок
    ];

    protected QuestionType $textType;

    public function __construct()
    {
        $this->textType = QuestionType::where('code', 'text')->firstOrFail();
    }

    public function run(User $user): array
    {
        $quiz = Quiz::query()
            ->where('slug', 'intelligence-level')
            ->firstOrFail();

        $types = IntelligenceLevelType::all();

        $valueTypes = array();
        foreach ($types as $type) {
            $valueTypes[$type->id] = [
                'value' => 0,
                'percentage' => 0,
            ];
        }

        // подсчет очков за каждый вопрос
        $questions = Question::where('quiz_id', $quiz->id)->get();
        foreach ($questions as $index => $question) {
            $correctAnswer = $this->correctAnswers[$index];
            $answersQuery = UserAnswer::query()->where('quiz_id', $quiz->id)
                ->where('user_id', $user->id)
                ->where('question_id', $question->id)
                ->whereNull('deleted_at');

            if(is_array($correctAnswer)) {
               $userAnswers = $answersQuery->get();
               if($this->checkCorrectUserAnswers($userAnswers, $question, $correctAnswer)) {
                   $this->incrementScore($question, $valueTypes);
               }
            } else {
                $userAnswer = $answersQuery->firstOrFail();
                if($this->checkCorrectUserAnswer($userAnswer, $question, $correctAnswer)) {
                    $this->incrementScore($question, $valueTypes);
                }
            }
        }

        // подсчет процентов
       $this->calculatePercentages($valueTypes);

        return $valueTypes;
    }


    /**
     * Подсчет процента правильно отвеченных вопросов на каждый тип
     * @param $valueTypes
     */
    protected function calculatePercentages(&$valueTypes) {
        foreach ($valueTypes as $key => $valueType) {
            switch ($key) {
                case 1:
                    $valueTypes[$key]['percentage'] = (100 / 6) * $valueTypes[$key]['value'];
                    break;
                case 2:
                case 3:
                    $valueTypes[$key]['percentage'] = (100 / 8) * $valueTypes[$key]['value'];
                    break;
            }

            $valueTypes[$key]['percentage'] = floor($valueTypes[$key]['percentage']);
        }
    }

    /**
     * Увеличение очков за правильный ответ на вопрос
     * @param Question $question
     * @param array $valueTypes
     */
    protected function incrementScore(Question $question, array &$valueTypes) {
        try {
            $valueTypes[$question->questionable_id]['value']++;
        } catch (\Exception $exception) {
            Log::error('undefined question intelligence level type');
        }
    }

    /**
     * Проверка вопроса на правильный ответ
     * @param $userAnswer
     * @param $question
     * @param $correctAnswer
     * @return bool
     */
    protected function checkCorrectUserAnswer($userAnswer, $question, $correctAnswer): bool {
        if($question->type_id == $this->textType->id) {
            if($correctAnswer == $userAnswer->value || $correctAnswer == intval($userAnswer->value)) {
                return true;
            }
        } else {
            if($correctAnswer == $userAnswer->answer->value) {
                return true;
            }
        }

        return false;
    }

    /**
     * Проверка вопроса на правильные ответы
     * @param $userAnswers
     * @param $question
     * @param $correctAnswers
     * @return bool
     */
    protected function checkCorrectUserAnswers($userAnswers, $question, $correctAnswers): bool {
        if(count($userAnswers) != count($correctAnswers)) return false;

        foreach ($correctAnswers as $correctAnswer) {
            $isFind = false;

            // поиск корректного ответа
            foreach ($userAnswers as $userAnswer) {
                if($this->checkCorrectUserAnswer($userAnswer, $question, $correctAnswer)) {
                    $isFind = true;
                    break;
                }
            }

            // если корректный ответ не найден
            if(!$isFind) {
                return false;
            }
        }

        return true;
    }

}
