<?php

namespace App\Quiz\Wrappers;

use Arr;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\CharacterTraitResultValue;

class CharacterTraitResultWrapper
{
    private array $results;

    public function setData(array $data)
    {
        $this->results = $data;
    }

    public function isHigherValue(CharacterTrait $trait)
    {
        return $this->results[$trait->code] > $trait->dividing_score;
    }

    public function title(CharacterTrait $trait, bool $isHigher = null): string
    {
        if(is_null($isHigher)) {
            return $this->isHigherValue($trait)
                ? $trait->higher_value
                : $trait->lower_value;
        } else {
            return $isHigher
                ? $trait->higher_value
                : $trait->lower_value;
        }
    }

    public function percentage(CharacterTrait $trait): int
    {
        return $this->isHigherValue($trait)
            ? 52 + ($this->results[$trait->code] - 8) * 6
            : 100 - $this->results[$trait->code] * 6;
    }

    public function chartPercentage(CharacterTrait $trait): int
    {
        return $this->percentage($trait) - 50;
    }

    public function color(bool $isHigher)
    {
        return $isHigher
            ? 'orange'
            : 'alla';
    }

    public function bootstrapClassName(bool $isHigher): string
    {
        return 'bg-' . $this->color($isHigher);
    }

    public function description(CharacterTrait $trait)
    {
        return $this->isHigherValue($trait)
            ? $trait->higher_description
            : $trait->lower_description;
    }

    public function titleAsArray(CharacterTrait $trait, bool $isHigher)
    {
        $a = explode(' ', $this->title($trait, $isHigher));

        foreach($a as $key => $item) {
            $a[$key] = "'" . $item . "'";
        }

        return '[' . implode(',', $a) . ']';
    }
}
