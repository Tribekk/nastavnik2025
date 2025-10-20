<?php

namespace Domain\Quiz\Models;

use Support\Model;

/**
 * @property ParentQuestionnaireResult result
 * @property int result_id
 * @property Question question
 * @property int question_id
 * @property Answer answer
 * @property int answer_id
 */
class ParentQuestionnaireResultValue extends Model
{
    protected $guarded = [];

    public function result()
    {
        return $this->belongsTo(ParentQuestionnaireResult::class, 'result_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }
}
