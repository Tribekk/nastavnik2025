<?php

namespace App\Admin\Actions;

use Domain\Admin\Models\LoyaltyLevel;

class GetLoyaltyLevelsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = LoyaltyLevel::query();

        if ($transform) {
            $query->select(['id', 'title as text']);
        }

        if ($q) {
            $query
                ->orWhere('title', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
