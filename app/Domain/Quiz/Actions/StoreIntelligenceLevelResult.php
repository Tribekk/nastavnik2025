<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\IntelligenceLevel;
use Domain\Quiz\Models\IntelligenceLevelResult;
use Domain\Quiz\Models\IntelligenceLevelResultValue;
use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreIntelligenceLevelResult
{
    protected CalculateIntelligenceLevelValues $calculateIntelligenceLevelValues;

    public function __construct()
    {
        $this->calculateIntelligenceLevelValues = app()->make(CalculateIntelligenceLevelValues::class);
    }

    public function run(User $user): ?IntelligenceLevelResult
    {
        DB::transaction(function () use ($user, &$result) {
            $uuid = Str::uuid();
            IntelligenceLevelResult::where('user_id', $user->id)->delete();

            $values = $this->calculateIntelligenceLevelValues->run($user);

            $total = ['value' => 0, 'percentage' => 0];
            foreach ($values as $value) {
                $total['value'] += $value['value'];
            }

            $total['percentage'] = floor((100 / 22) * $total['value']);
            $level = $this->getIntelligenceLevelByScore($total['value']);

            $result = IntelligenceLevelResult::create([
                'uuid' => $uuid,
                'user_id' => $user->id,
                'level_id' => $level->id,
                'value' => $total['value'],
                'percentage' => $total['percentage'],
            ]);

            foreach ($values as $key => $value) {
                $intelligenceLevel = IntelligenceLevelType::where('id', $key)->firstOrFail();

                IntelligenceLevelResultValue::create([
                    'uuid' => Str::uuid(),
                    'result_id' => $result->id,
                    'type_id' => $intelligenceLevel->id,
                    'value' => $value['value'],
                    'percentage' => $value['percentage'],
                ]);
            }
        });

        return $result;
    }

    protected function getIntelligenceLevelByScore(int $score): IntelligenceLevel {
        if($score <= 8) return IntelligenceLevel::where('title', 'низкий')->firstOrFail();
        else if($score <= 10) return IntelligenceLevel::where('title', 'ниже среднего')->firstOrFail();
        else if($score <= 13) return IntelligenceLevel::where('title', 'средний')->firstOrFail();
        else if($score <= 18) return IntelligenceLevel::where('title', 'выше среднего')->firstOrFail();
        else return IntelligenceLevel::where('title', 'высокий')->firstOrFail();
    }
}
