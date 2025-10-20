<?php

namespace Domain\Quiz\Models;

use Support\Model;

class SolutionCasesResultValue extends Model
{
    protected $table = "solution_of_cases_result_values";

    protected $guarded = [];

    public function result()
    {
        return $this->belongsTo(SolutionCasesResult::class, "result_id");
    }

    public function interpretation()
    {
        return $this->belongsTo(SituationInterpretation::class, "interpretation_id");
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class, "situation_id");
    }
}
