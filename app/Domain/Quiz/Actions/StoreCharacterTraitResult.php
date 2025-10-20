<?php

namespace Domain\Quiz\Actions;

use App\Quiz\Wrappers\CharacterTraitResultWrapper;
use DB;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\CharacterTraitResultValue;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Str;

class StoreCharacterTraitResult
{
    protected CalculateCharacterTraitValues $traitValuesCalculator;

    protected CalculateCharacterTraitAnswersReliability $unreliabilityCalculator;

    protected CharacterTraitResultWrapper $traitWrapper;

    public function __construct()
    {
        $this->traitValuesCalculator = app()->make(CalculateCharacterTraitValues::class);
        $this->unreliabilityCalculator = app()->make(CalculateCharacterTraitAnswersReliability::class);
        $this->traitWrapper = app()->make(CharacterTraitResultWrapper::class);
    }

    public function run(User $user): ?CharacterTraitResult
    {
        $result = $this->traitValuesCalculator->run($user);
        $this->traitWrapper->setData($result);

        DB::transaction(function () use ($user, &$traitResult) {
            $traits = CharacterTrait::all();
            $uuid = Str::uuid();
            CharacterTraitResult::where('user_id', $user->id)->delete();

            $traitResult = CharacterTraitResult::create([
                'uuid' => $uuid,
                'user_id' => $user->id,
                'reliability' => $this->unreliabilityCalculator->run($user)
            ]);

            foreach ($traits as $trait) {
                CharacterTraitResultValue::create([
                    'uuid' => Str::uuid(),
                    'trait_result_id' => $traitResult->id,
                    'trait_id' => $trait->id,
                    'title' => $this->traitWrapper->title($trait),
                    'is_higher' => $this->traitWrapper->isHigherValue($trait),
                    'percentage' => $this->traitWrapper->percentage($trait),
                    'chart_percentage' => $this->traitWrapper->chartPercentage($trait),
                    'description' => $this->traitWrapper->description($trait),
                ]);
            }
        });

        return $traitResult;
    }
}
