<?php

namespace Domain\School\Wrappers;

use Domain\Consultation\States\CarriedOutConsultationState;

class SchoolStudentQuizWrapper
{
    public function takeStatusQuizzesClass($students): array
    {
        $countNotFinished = $this->countNotFinishedBase($students);
        $countStudents = $students->count();

        $percentage = $countStudents == 0 ? 0 : floor((100 /$countStudents) * ($countStudents - $countNotFinished));

        $result =  [
            'class_color' => $countNotFinished > 0  ? 'text-primary' : 'text-success',
            'status_label' => $countNotFinished > 0 ? "Базовый этап завершен на {$percentage}%" : 'Базовый этап завершен на 100%',
        ];

        if($countStudents == 0) {
            $result['class_color'] = 'text-dark';
            $result['status_label'] = 'нет зарегистрированных пользователей';
        }

        return $result;
    }

    /**
     * Возвращает html со статусом прохождения базового тестирования
     * @param $student
     * @return string
     */
    public function studentBaseTestStatus($student): string
    {
        $percentage = 100;
        $status = "Да";
        $textColor = "text-success";

        // подсчет кол-ва результатов на базовые тесты
        $count = $student->countNotFinishedBaseTests;

        // обновление статуса и расчет процента прохождения базового теста
        if($count > 0) {
            $status = 'Нет';
            $textColor = 'text-primary';

            $percentage = floor((100 / 3) * (3-$count));
        }

        $result = '<span class="font-size-h5 '.$textColor.'">'.$status.'</span>';

        return $percentage > 0 ?
            $result . " <span class='text-dark-50 font-size-lg'>({$percentage}%)</span>" :
            $result;
    }

    public function markQuestionnaireStudents($students)
    {
        $countNotFinished = $this->countNotFinishedQuestionnaire($students);

        $result =  [
            'class_color' => $countNotFinished > 0  ? 'text-primary' : 'text-success',
            'label' => $countNotFinished > 0 ? "Не заполнили {$countNotFinished} " .num2word($countNotFinished, ['человек', 'человека', 'человек']) : 'Все заполнили',
        ];

        if($students->count() == 0) {
            $result['class_color'] = 'text-dark';
            $result['label'] = '-';
        }

        return $result;
    }

    public function markBaseTestStudents($students)
    {
        $countNotFinished = $this->countNotFinishedBaseTests($students);

        $result =  [
            'class_color' => $countNotFinished > 0  ? 'text-primary' : 'text-success',
            'label' => $countNotFinished > 0 ? "Не прошли {$countNotFinished} ".num2word($countNotFinished, ['человек', 'человека', 'человек']) : 'Все прошли',
        ];

        if($students->count() == 0) {
            $result['class_color'] = 'text-dark';
            $result['label'] = '-';
        }

        return $result;
    }

    public function countNotFinishedAll($students)
    {
        $result = 0;

        foreach ($students as $student) {
            if(!$student->finishedBaseTests || !$student->finishedDepthTests) {
                $result++;
                continue;
            }
        }

        return $result;
    }

    public function countNotFinishedBaseTests($students)
    {
        $result = 0;

        foreach ($students as $student) {
            if($student->countNotFinishedBaseTests) {
                $result++;
                continue;
            }
        }

        return $result;
    }

    public function countNotFinishedBase($students)
    {
        $result = 0;

        foreach ($students as $student) {
            if(!$student->finishedBaseTests) {
                $result++;
                continue;
            }
        }

        return $result;
    }

    public function countNotFinishedDepth($students)
    {
        $result = 0;

        foreach ($students as $student) {
            if(!$student->finishedDepthTests) {
                $result++;
                continue;
            }
        }

        return $result;
    }

    public function countNotFinishedQuestionnaire($students)
    {
        $result = 0;

        foreach ($students as $student) {
            if(!$student->studentQuestionnaireFinished) {
                $result++;
                continue;
            }
        }

        return $result;
    }

    public function studentsInvitedDepthTests($students)
    {
        $studentsCount = $students->count();
        $count = $this->countStudentsInvitedDepthTests($students);

        $percentage = $studentsCount == 0 ? 0 : floor((100 / $studentsCount) * $count);
        $label = $studentsCount == $count ? 'все приглашены' : $count.' '.num2word($count, ['человек', 'человека', 'человек']);

        return [
            'count' => $count,
            'percentage' => $percentage,
            'label' => $label,
        ];
    }

    public function countStudentsInvitedDepthTests($students)
    {
        $result = 0;
        foreach ($students as $student) {
            if($student->hasDepthTests()) $result++;
        }
        return $result;
    }


    public function studentsFinishedConsultation($students)
    {
        $studentsCount = $students->count();
        $count = $this->countStudentsFinishedConsultation($students);
        $percentage = $studentsCount == 0 ? 0 : floor((100 / $studentsCount) * $count);
        $label = $studentsCount == $count ? 'все получили' : $count.' '.num2word($count, ['человек', 'человека', 'человек']);

        return [
            'count' => $count,
            'percentage' => $percentage,
            'label' => $label,
        ];
    }

    public function countStudentsFinishedConsultation($students)
    {
        $result = 0;
        foreach ($students as $student) {
            if($student->consultations()->whereState('state', CarriedOutConsultationState::class)->first()) $result++;
        }
        return $result;
    }
}
