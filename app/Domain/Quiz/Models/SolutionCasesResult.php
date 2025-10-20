<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Support\Model;

class SolutionCasesResult extends Model
{
    protected $table = "solution_of_cases_results";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function values()
    {
        return $this->hasMany(SolutionCasesResultValue::class, "result_id");
    }
}
