<?php

namespace App\Quiz\Wrappers;

use Domain\Quiz\Models\SolutionCasesResultValue;

class SolutionCasesResultWrapper
{
    public function setData(array $data)
    {
        $this->results = $data;
    }

    public function results(int $situationId, int $resultId)
    {
        return SolutionCasesResultValue::where('situation_id', $situationId)
            ->where('result_id', $resultId)->get();
    }
}
