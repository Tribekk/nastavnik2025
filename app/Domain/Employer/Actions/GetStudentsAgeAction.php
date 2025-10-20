<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class GetStudentsAgeAction
{
    public function run()
    {
        $users = User::distinct()
            ->students()
            ->select([DB::raw('YEAR(birth_date) as year')])
            ->whereNotNull('birth_date')
            ->orderBy('year', 'desc')
            ->get();

        $result = [
            ['title' => 'Показать все', 'value' => 'all'],
        ];

        foreach ($users as $user) {
            $age = (now()->year - $user->year);
            if($age <= 0) continue;

            $result[] = [
                'title' => $age . " " . num2word($age, ['год', 'года', 'лет']),
                'value' => $age,
            ];
        }

        return $result;
    }
}
