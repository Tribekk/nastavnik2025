<?php

namespace App\Admin\Actions;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class GetResultsSchoolClassesStudentsTestsAction
{
    public function run(Request $request)
    {
        $tests = $this->takeTestsParams($request);
        $schoolWhere = $this->takeSchoolWhere($request);
        $classWhere = $this->takeClassWhere($request);

        $result = DB::select("
            SELECT
                qq.school AS school,
                qq.school_id,
                qq.school_number,
                qq.class_title AS class,
                qq.class_id,
                qq.class_number,
                qq.class_letter,
                qq.finished AS finished_quizzes,
                qq.not_finished AS not_finished_quizzes,
                (qq.finished) / (qq.not_finished + qq.finished) * 100 AS finish_percentage
            FROM (
                     SELECT
                         q.school,
                         q.class_title,
                         q.school_id,
                         q.school_number,
                         q.class_id,
                         q.class_number,
                         q.class_letter,
                         COUNT(
                                 IF(q.finished = 1, 1, NULL)
                             ) AS finished,
                         COUNT(
                                 IF(q.finished = 0, 1, NULL)
                             ) AS not_finished
                     FROM (
                              SELECT
                                  s.short_title AS school,
                                  CONCAT_WS(' ', c.number, c.letter) AS class_title,
                                  aq.user_id AS user_id,
                                  CONCAT_WS(' ', u.last_name, u.first_name, u.middle_name) name,
                                  r.title AS role_title,
                                  s.id AS school_id,
                                  s.number AS school_number,
                                  c.id AS class_id,
                                  c.number AS class_number,
                                  c.letter AS class_letter,
                                  IF(count(aq.user_id) = {$tests['count']}, 1, 0) finished
                              FROM users u
                                       INNER JOIN school_classes c ON u.class_id = c.id
                                       INNER JOIN schools s
                                            ON c.school_id = s.id
                                            AND c.school_id {$schoolWhere['operator']} {$schoolWhere['id']}
                                            AND c.id {$classWhere['operator']} {$classWhere['id']}
                                       INNER JOIN model_has_roles mhr ON mhr.model_id = u.id
                                       INNER JOIN roles r on mhr.role_id = r.id AND r.title = 'Учащийся'
                                       INNER JOIN available_quizzes aq
                                                  ON u.id = aq.user_id
                                                      AND aq.state like '%FinishedQuizState'
                                                      AND (select `group` from quizzes where id = aq.quiz_id limit 1) = {$tests['group']}
                              GROUP BY 1, 2, 3, 4, 5
                              ORDER BY school, class_title, name) q
                     GROUP BY 1, 2, 3, 4, 5, 6, 7) qq
            ORDER BY
                     school_number ASC,
                     class_number ASC,
                     class_letter ASC
        ");

        $collect = collect($result);

        return new LengthAwarePaginator(
            $collect->forPage(request('page', 1), request('perPage', 15)),
            $collect->count(),
            request('perPage', 15),
            request('page', 1),
            [
                'path' => route('admin.reports.students_tests'),
            ],
        );
    }

    private function takeTestsParams(Request $request): array
    {
        $group = $request->input('group');

        if($group == 'depth') {
            return ['group' => 1, 'count' => 4];
        }

        return ['group' => 0, 'count' => 4];
    }

    private function takeSchoolWhere(Request $request): array
    {
        if(!empty($request->input('school_id'))) {
            return ['id' => intval($request->input('school_id')), 'operator' => "="];
        }

        return ['id' => 0, 'operator' => '!='];
    }

    private function takeClassWhere(Request $request): array
    {
        if(!empty($request->input('class_id'))) {
            return ['id' => intval($request->input('class_id')), 'operator' => "="];
        }

        return ['id' => 0, 'operator' => '!='];
    }
}
