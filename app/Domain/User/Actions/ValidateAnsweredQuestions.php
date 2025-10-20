<?php

namespace Domain\User\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class ValidateAnsweredQuestions
{
    protected $errors = [];
    protected $quiz;
    protected $user;


    /**
     * @param Quiz $quiz
     * @param User $user
     * @param bool $canValidate - если true то вернет массив с ошибками
     * @return array|null
     */
    public function run(Quiz $quiz, User $user, $canValidate = true)
    {
        $this->quiz = $quiz;
        $this->user = $user;

        if($canValidate) {
            $this->validate();
            return $this->errors();
        }

        return null;
    }

    /**
     * Возвращает массив с ошибками [message => сообщение с ошибкой, index => индекс вопроса]
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }


    /**
     * Возвращает кол-во правильно отвеченных вопросов
     * @return int
     */
    public function correctAnsweredQuestionCount(): int
    {
        return $this->quiz->questionCount - count($this->errors);
    }

    /**
     * Возвращает кол-во отвеченных вопросов
     * @return int
     */
    public function answeredQuestionCount(): int
    {
        return UserAnswer::query()
            ->distinct()
            ->select('question_id')
            ->where('quiz_id', $this->quiz->id)
            ->where('user_id', $this->user->id)->get()->count();
    }

    /**
     * Функция валидации всех вопросов
     * Возвращает true если все вопросы отвечены правильно
     * @return bool
     */
    public function validate(): bool {
        $this->errors = [];
        foreach ($this->quiz->questions as $index => $question) {
            $questionAnswersCount = $this->questionAnswersCount($question);

            $questionAnswer = UserAnswer::query()
                ->where('question_id', $question->id)
                ->where('quiz_id', $this->quiz->id)
                ->where('user_id', $this->user->id)->first();

            /**
             * Пропустит вопрос если у вопроса есть зависимость от другого вопроса и
             * ответ не совпадает с нужным для отображения вопроса
             */
            if(!$question->isRequiredQuestion($this->user->id) && $question->required) {
                continue;
            }

            if($question->type->code === 'select_city' && !$this->validateSelectCity($question, $questionAnswer, $index)) {
                continue;
            }

            if($question->type->code === 'text' && !$this->validateText($question, $questionAnswer, $index)) {
                continue;
            }

            if($question->type->code === 'text' && !$this->validateUniqueEmailQuestionnaire($question, $questionAnswer, $index)) {
                continue;
            }

            if(!$this->validateCountAnswersToQuestions($question, $questionAnswersCount, $index)) {
                continue;
            }
        }

        return !count($this->errors);
    }

    /**
     * Возвращает кол-во ответов на вопрос
     * @param Question $question
     * @return int
     */
    protected function questionAnswersCount(Question $question): int {
        return UserAnswer::query()
            ->where('question_id', $question->id)
            ->where('quiz_id', $this->quiz->id)
            ->where('user_id', $this->user->id)->count();
    }

    /**
     * Возвращает true если заполнено правильно
     * @param Question $question
     * @param $questionAnswer
     * @param int $index
     * @return bool
     */
    protected function validateSelectCity(Question $question, $questionAnswer, int $index): bool
    {
        if($question->required && (empty($questionAnswer) || !strlen($questionAnswer->value))) {
            $this->addError($index, "Нет ответа");
            return false;
        }

        return true;
    }

    /**
     * Возвращает true если заполнено правильно
     * @param Question $question
     * @param $questionAnswer
     * @param int $index
     * @return bool
     */
    protected function validateText(Question $question, $questionAnswer, int $index): bool
    {
        if($question->required && (empty($questionAnswer) || !strlen($questionAnswer->value))) {
            $this->addError($index, "Нет ответа");
            return false;
        }

        return true;
    }

    /**
     * Возвращает true если кол-во ответов на вопрос находится в пределах ограничений
     * @param Question $question
     * @param int $questionAnswersCount
     * @param int $index
     * @return bool
     */
    protected function validateCountAnswersToQuestions(Question $question, int $questionAnswersCount, int $index): bool {
        if(($question->required || (!$question->required && $questionAnswersCount > 0)) && ($questionAnswersCount < $question->min_answers || $questionAnswersCount > $question->max_answers)) {
            if($question->min_answers == $question->max_answers) {

                if($questionAnswersCount > $question->max_answers) {
                    $this->addError($index, "Количество ответов не может быть больше {$question->max_answers}");
                } else {
                    $this->addError($index, "Количество ответов не может быть меньше {$question->min_answers}");
                }

            } else {
                $this->addError($index, "Количество ответов не может быть меньше {$question->min_answers} и больше {$question->max_answers}");
            }
            return false;
        }

        return true;
    }

    /**
     * Валидация email на уникальность в таблице пользователей
     * @param Question $question
     * @param $questionAnswer
     * @param int $index
     * @return bool
     */
    public function validateUniqueEmailQuestionnaire(Question $question, $questionAnswer, int $index): bool {
        if($this->quiz->type == "form") {
            $isEmailQuestion = Question::where('id', $question->id)
                ->whereIn('content', ['Электронная почта', 'Если есть, укажи адрес электронной почты'])
                ->first();

            if(empty($isEmailQuestion) || empty($questionAnswer->value) || !strlen($questionAnswer->value)) return true;

            if(User::where('email', $questionAnswer->value)->where('id', '!=', $this->user->id)->count()) {
                $this->addError($index, "Указанный адрес электронной почты уже зарегистрирован другим пользователем");
                return false;
            }

            if(!filter_var($questionAnswer->value, FILTER_VALIDATE_EMAIL)) {
                $this->addError($index, "Пожалуйста, укажите корректный адрес электронной почты");
                return false;
            }
        }

        return true;
    }

    /**
     * Функция формирования сообщения об ошибке в вопросе
     * @param int $index
     * @param string $message
     * @return string
     */
    protected function errorMessage(int $index, string $message): string
    {
        return "Вопрос ".($index+1).": $message";
    }

    /**
     * Функция добавления ошибки в массив с ошибками
     *
     * @param int $index
     * @param string $message
     */
    protected function addError(int $index, string $message): void {
        $this->errors[] = [
            'question_index' => $index,
            'message' => $this->errorMessage($index, $message),
        ];
    }
}
