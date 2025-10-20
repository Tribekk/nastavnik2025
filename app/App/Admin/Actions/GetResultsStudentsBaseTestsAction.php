<?php

namespace App\Admin\Actions;

use Illuminate\Support\Facades\DB;

class GetResultsStudentsBaseTestsAction
{
    public function run()
    {
        return DB::select("
            SELECT
                s.title AS school,
                CONCAT_WS(' ', c.number, c.letter) AS class_title,
                aq.user_id AS user_id,
                CONCAT_WS(' ', u.last_name, u.first_name, u.middle_name) name,
                r.title AS role_title,
                IF(count(aq.user_id) = 4, 1, 0) finished,
                100 / 4 * count(aq.user_id) finished_percentage
            FROM users u
                     INNER JOIN school_classes c on u.class_id = c.id
                     INNER JOIN schools s on c.school_id = s.id
                     INNER JOIN model_has_roles mhr ON mhr.model_id = u.id
                     INNER JOIN roles r on mhr.role_id = r.id AND r.title = 'Учащийся'
                     INNER JOIN available_quizzes aq
                                ON u.id = aq.user_id
                                    AND aq.state like '%FinishedQuizState'
                                    AND (select `group` from quizzes where id = aq.quiz_id limit 1) = 0
            GROUP BY 1, 2, 3, 4, 5
        ");
    }
}
