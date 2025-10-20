<?php

namespace App\Exports;

use Domain\Quiz\Models\IntelligenceLevel;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Situation;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\UserProfile\Models\UserProfile;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use \Maatwebsite\Excel\Sheet;
use \Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \Maatwebsite\Excel\Concerns\WithColumnWidths;
use Domain\Quiz\Models\Inclination;



Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()
        ->getStyle($cellRange)
        ->applyFromArray($style);
});

class StudentReportExport implements WithColumnWidths, FromArray, WithEvents, WithHeadings
{
    private $data;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($data) {

        $this->data=$data;
    }



    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'F' => 15,
            'I' => 15
        ];
    }

    public function headings(): array
    {
        return [
            ['Очет по базе учеников'],
            [
                '№',
                'ФИО',
                'Город',
                'Компания',
                'Структурное подразделение',
                'Телефон',
                'E-mail',
                'Уровень образования',
                'Категория сотрудника',
                'Профессия',
                'Квалификация по профессии',
                'Общий стаж работы',
                'Стаж работы в компании',
                'Стаж работы в компании в текущей профессии/должности',
                'Ваш опыт наставничества',
                'Степень соответствия общим данным анкеты',
                'Соответствие модели компетенций наставника',
                'Общее соответствие модели личностных характеристик наставника',
                'Общее соответствие модели профессиональных характеристик наставника',
                'Анкета',
                'Отметка решения кейсов',
                'Отметка ответов на soft вопросы',
                'Отметка ответов на hard вопросы',
                'Ориентирован на приобретение нового опыта и саморазвитие',
                'Нацелен на достижение подопечным наилучших результатов, обладает навыками планирования',
                'Ориентирован на передачу своих знаний и навыков',
                'Проявляет терпение, доброжелательность, объективность',
                'Владеет навыками коммуникации и обратной связи, применяет их в работе с подопечными',
                'Знание и применение инструментов ОТиПБ',
                'Понимание процессов организации наставничества',
                'Знание и применение методов обучения и адаптации на производстве',

                'Наставник получил консультацию',
                'Заключение HR',
                'Согласие на деятельность наставника',
                'Количество посещенных мероприятий',
                'Направление',
                'Формат мероприятий',
                'Прохождение квиза',
//                'Средняя оценка по итогам мероприятий',
                'Итоги отбора',
                'Заголовок заметки /Текст',
                'Участие в мероприятиях, чемпионатах, конкурсах',
                'Единое окно обмена и хранения',
                'Отбор по глубинному тестированию',
                'Рекомендован',
                'Приглашение на глубинное тестирование',

            ],

        ];
    }


    private function getTypes() {
        $types=[
            'green',
            'yellow',
            'red',
        ];

        return $types;
    }

    protected function unserialise($control_values) {
        if(empty($control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }

        return $control_values;
    }




    public function array(): array
    {

        ////погнали выводить данные
        $users=$this->data["users"];
        $data=$this->data;

        foreach($users as $index => $user) {
            $User = \Domain\User\Models\User::where('id', $user->user_id)->first();
            $str = array();
            $additional_rows = 0;

            $color_td = "";

            if (@$data['profiler'][$user->id]['color'] == "green") {
                $color_td = 'lightgreen';
            }

            if (@$data['profiler'][$user->id]['color'] == "red") {
                $color_td = 'red';
            }

            if (@$data['profiler'][$user->id]['color'] == "yellow") {

                $color_td = 'yellow';
            }
            //1. №
            $str[] = $users->firstItem() + $index;

            //2. ФИО
            $str[] = $user->full_name;

            //3. Город
            $str[] = $user->kladr_name;

            //4. Компания
            $str[] = $user->school;

            //5. Структурное подразделение
            $str[] = $user->class;

            //6. Телефон
            if ($user->phone)
                $str[] = $user->phone;
            else
                $str[] = "";

            ////////////////////////////////
            //7. E-mail
            if ($user->email)
                $str[] = $user->email;
            else
                $str[] = "";


////////////////////////////////////////////////////////////////////
//          8.  Уровень образования

            if (isset($data['profiler'][$user->id]['education_level'])) {
                foreach ($data['profiler'][$user->id]['education_level'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

///////////////////////////////////////////////////////////////
            //9. Категория сотрудника
            if (isset($data['profiler'][$user->id]['cat_employee'])) {
                foreach ($data['profiler'][$user->id]['cat_employee'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

//////////////////////////////////////////////////////////////////////////////
            //10. Профессия
            if (isset($data['profiler'][$user->id]['profession'])) {
                foreach ($data['profiler'][$user->id]['profession'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

////////////////////////////////////////////
            //11. Квалификация по профессии
            if (isset($data['profiler'][$user->id]['skill_profession'])) {
                foreach ($data['profiler'][$user->id]['skill_profession'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            /////////////////////////////////////////////////////////////////
            //12. Общий стаж работы
            if (isset($data['profiler'][$user->id]['total_experience'])) {
                foreach ($data['profiler'][$user->id]['total_experience'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            ///////////////////////////////////////////
            //13. Стаж работы в компании

            if (isset($data['profiler'][$user->id]['experience_company'])) {
                foreach ($data['profiler'][$user->id]['experience_company'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            ///////////////////////////////////////////////////////////////
            //14. Стаж работы в компании в текущей профессии/должности

            if (isset($data['profiler'][$user->id]['experience_company_position'])) {
                foreach ($data['profiler'][$user->id]['experience_company_position'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            /////////////////////////////
            //15. Ваш опыт наставничества
            if (isset($data['profiler'][$user->id]['mentoring_experience'])) {
                foreach ($data['profiler'][$user->id]['mentoring_experience'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            //////////////////////////////////////////////////////
            //16. Степень соответствия общим данным
            if (isset($data['profiler'][$user->id]['general_data'])) {
                $description = $data['profiler'][$user->id]['general_data']["description"];
                $color = $data['profiler'][$user->id]['general_data']["background_color"];

                $str[] = "[$color]$description"; // Добавляем описание в массив

            } else {
                $str[] = "---"; // В случае отсутствия данных добавляем "---" в массив
            }

            ////////////////////////////////////////////////////////////////////////////////////////////
            //31. Общее соответствие модели профессиональных характеристик наставника
            if (isset($data['profiler'][$user->id]['result_characters']['result']["description"])) {
                $color = $data['profiler'][$user->id]['result_characters']['result']["background_color"];
                $str[] = "[$color]".$data['profiler'][$user->id]['result_characters']['result']["description"];
            } else {
                $str[] = "---";
            }

            ///////////////////////////////////////////////////////
            //17. Общее соответствие модели личностных характеристик наставника
            if (isset($data['profiler'][$user->id]['personal_characters']['result']["description"])) {
                $description = $data['profiler'][$user->id]['personal_characters']['result']["description"];
                $color = $data['profiler'][$user->id]['personal_characters']['result']["background_color"];

                if (!empty($description)) {
                    $str[] = "[$color]$description"; // Добавляем описание в массив
                } else {
                    $str[] = "---";
                }
            } else {
                $str[] = "---";
            }

            ///////////////////////////////////
            //18. Общее соответствие модели профессиональных характеристик наставника
            if (isset($data['profiler'][$user->id]['prof_characters']['result']["description"])) {
                $description = $data['profiler'][$user->id]['prof_characters']['result']["description"];
                $color = $data['profiler'][$user->id]['prof_characters']['result']["background_color"];
                if (!empty($description)) {
                    $str[] = "[$color]$description"; // Добавляем описание в массив
                } else {
                    $str[] = "---";
                }
            } else {
                $str[] = "---";
            }
            ////////////////////////////////////////////////////////////////

            //19. Анкета
            if ($user->student_questionnaire_finished) {
                $str[] = "[lightgreen]Заполнена";
            } else {
                $str[] = "[red]Не заполнена";
            }

/////////////////////////////////////////////////////////////////////////////////////
            //20. Отметка решения кейсов
            if ($user->user->getTypeThinkingQuizFinishedAttribute(8)) {
                $str[] = "[lightgreen]Да";
            } else {
                $str[] = "[red]Нет";
            }


            //////////////////////////////////////////////////////////////////
            //21. Отметка ответов на soft вопросы
            if ($user->user->getTypeThinkingQuizFinishedAttribute(13)) {
                $str[] = "[lightgreen]Да";
            } else {
                $str[] = "[red]Нет";
            }

            ////////////////////////////////////////////////////////////
            //22. Отметка ответов на hard вопросы
            if ($user->user->getTypeThinkingQuizFinishedAttribute(3)) {
                $str[] = "[lightgreen]Да";
            } else {
                $str[] = "[red]Нет";
            }

            /////////////////////////////////////////////
            //23. Ориентирован на приобретение нового опыта и саморазвитие
            if (isset($data['profiler'][$user->id]['personal_characters']['new_experience'])) {
                foreach ($data['profiler'][$user->id]['personal_characters']['new_experience'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            //////////////////////////////////////////////////////////////////////////////////////////////////
            //24. Нацелен на достижение подопечным наилучших результатов, обладает навыками планирования
            if (isset($data['profiler'][$user->id]['personal_characters']['best_results'])) {
                foreach ($data['profiler'][$user->id]['personal_characters']['best_results'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            ///////////////////////////////////////////////

            //25. Ориентирован на передачу своих знаний и навыков
            if (isset($data['profiler'][$user->id]['personal_characters']['transfer_skills'])) {
                foreach ($data['profiler'][$user->id]['personal_characters']['transfer_skills'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            ////////////////////////////////////////////////////////

            //26. Проявляет терпение, доброжелательность, объективность
            if (isset($data['profiler'][$user->id]['personal_characters']['show_objectivity'])) {
                foreach ($data['profiler'][$user->id]['personal_characters']['show_objectivity'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            /////////////////////////////////////////
            //27. Владеет навыками коммуникации и обратной связи, применяет их в работе с подопечными
            if (isset($data['profiler'][$user->id]['personal_characters']['communication_skills'])) {
                foreach ($data['profiler'][$user->id]['personal_characters']['communication_skills'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }

            //////////////////////////////////////////////////////////////////////////////////////////////////////////
            //28. Знание и применение инструментов ОТиПБ
            if (isset($data['profiler'][$user->id]['prof_characters']['app_otipb'])) {
                foreach ($data['profiler'][$user->id]['prof_characters']['app_otipb'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            ////////////////////////////////////////////////////////////////////
            //29. Понимание процессов организации наставничества
            if (isset($data['profiler'][$user->id]['prof_characters']['understand_mentor'])) {
                foreach ($data['profiler'][$user->id]['prof_characters']['understand_mentor'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }


            /////////////////////////////////////////////////////////////////////////////////////////////////
            //30. Знание и применение методов обучения и адаптации на производстве
            if (isset($data['profiler'][$user->id]['prof_characters']['app_methods'])) {
                foreach ($data['profiler'][$user->id]['prof_characters']['app_methods'] as $type => $item) {
                    if ($type == "yellow") {
                        $type = "orange";
                    }
                    $str[] = "[$type]$item";
                }
            } else {
                $str[] = "---";
            }




            /////////////// ///////////////////////////////////////////////////////
            //32. Наставник получил консультацию
            if ($user->got_consultation_status == 'carried_out') {
                $str[] = "[lightgreen]Наставник получил консультацию";
            } elseif ($user->got_consultation_status == 'invited') {
                $str[] = "[lightgreen]Приглашен";
            } else {
                $str[] = "[red]Не приглашен";
            }

            ///////////////////////////////////////////////////////
            //33. Заключение профориентолога / HR
            $recommendation = "";
            if ($user->recommend == 'recommend') {
                $recommendation = "Рекомендован";
            } elseif ($user->agree == 'not_recommend') {
                $recommendation = "Не рекомендован";
            } else {
                $recommendation = "Нет информации";
            }

            $str[] = $recommendation;

            ///////////////////////////////////////////////////////////////////////////////
            //34. Согласие на целевое обучение
            if ($user->agree == 'agree') {
                $str[] = "Согласен";
            } elseif ($user->agree == 'not_agree') {
                $str[] = "Не согласен";
            } elseif ($user->agree == 'think') {
                $str[] = "Думает";
            } else {
                $str[] = "Нет информации";
            }

            ///////////////////////////////////////////////////////////////////////////////
            //35. Количество посещенных мероприятий
            $str[] = "$user->count_visited_events / $user->count_events";

            /////////////////////////////////////////////////
            //36. Направление
            $str[] = "Направление";

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //37. Формат мероприятий
            $str[] = " " . $user->events_formats . " ";

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //38. Прохождение квиза
            if ($data["personal_quiz"][$user->id] == 0) {
                $str[] = 'Нет';
            } else {
                $str[] = "Да, " . $data["personal_quiz"][$user->id] . " баллов";
            }

            ///////////////////////////////////////////////////////////////////
            //39. Средняя оценка по итогам мероприятий
//            $str[] = "Средняя оценка по итогам мероприятий";

            //////////////////////////////////
            ///40. Итоги отбора
            $selection_results = [
                'proposed_admission' => ['title' => 'Прошел тестирование, кейсы и анкету', 'value' => $user->proposed_admission],
                'applied_admission' => ['title' => 'Назначено обучение', 'value' => $user->applied_admission],
                'enrolled_profile_uz' => ['title' => 'Прошел обучение', 'value' => $user->enrolled_profile_uz],
                'concluded_target_agreement' => ['title' => 'Присвоен статус наставника', 'value' => $user->concluded_target_ag]
            ];
            $arr_selection_result = [];
            foreach ($selection_results as $selection_result) {
                $color = !empty($selection_result['value']) ? 'lightgreen' : 'red';
                $arr_selection_result[] = "[$color]" . $selection_result['title'];
            }


            $str[] = $arr_selection_result[0];
            if(count($arr_selection_result)>$additional_rows) {
                $additional_rows=count($arr_selection_result);
            }

            //////////////////////////////////////////////////////
            //41. Заголовок заметки /Текст
            $str[] = !empty($data["note_simple"]) ? $data["note_simple"][$user->id] : '---';

            ////////////////////////////////////////////////////////////////////////
            //42. Участие в мероприятиях, чемпионатах, конкурсах
            $str[] = !empty($data["note_events"]) ? $data["note_events"][$user->id] : '---';

            //////////////////////////////////////////////////////////////////
            //43. Единое окно обмена и хранения
            $str[] = '';
            //////////////////////////////////////////////////////////////////
            //44. Отбор по глубинному тестированию
            if (!empty($user->depth_tests_finished)) {
                $str[] = $user->depthStepSelectionLabel;
            } else {
                $str[] = "Не прошел тесты";
            }
            //////////////////////////////////////////////////////////////////
            //45. Рекомендован

            if ($user->recommend == 'recommend') {
                $str[] = "Рекомендован";
            } elseif ($user->recommend == 'not_recommend') {
                $str[] = "Не рекомендован";
            } else {
                $str[] = "Нет информации";
            }

            /////////////////////////////////////////////////
            // 46. Приглашение на глубинное тестирование
            if ($user->invited_depth_tests) {
                $str[] = "Приглашен";
            } else {
                $str[] = "Не приглашен на глубинное тестирование";
            }

            foreach ($str as &$item) {
                $item = str_replace('[green]', '[lightgreen]', $item);
                $item = str_replace('[yellow]', '[orange]', $item);
                $item = str_replace('[#ffffff]', '', $item);
                $item = str_replace('[#ff8c8a]', '[red]', $item);
            }

    $result[]=$str;

    ///дополняем массив строк
            for($i=1;$i<=$additional_rows-1;$i++) {
                $new_str=array();
                ///подготовка массива
                for($k=0;$k<=47;$k++) {
                    $new_str[$k]="";
                }

                ////заполнение дополнительными данными

                $new_str[39]=$arr_selection_result[$i] ?? '';


                $result[]=$new_str;
            }


}



        return $result;
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => [self::class, 'afterSheet'],
            BeforeSheet::class => [self::class, 'beforeSheet'],
        ];
    }


    public static function beforeSheet(BeforeSheet $event)
    {
        //
    }


    public static function afterSheet(AfterSheet $event){


        foreach($event->sheet->getCoordinates() as $coordinate) {
            $cell_value=$event->sheet->getCell($coordinate)->getValue();

            if(str_contains($cell_value,'[lightgreen]')) {
                $event->sheet->styleCells(
                    $coordinate,
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            'wrapText' => true,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => "00FF00"]
                        ]
                    ]
                );
            }


            if(str_contains($cell_value,'[red]')) {
                $event->sheet->styleCells(
                    $coordinate,
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => "ff8c8a"]
                        ]
                    ]
                );
            }


            if(str_contains($cell_value,'[yellow]')) {
                $event->sheet->styleCells(
                    $coordinate,
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => "FFA500"]
                        ]
                    ]
                );
            }


            if(str_contains($cell_value,'[orange]')) {
                $event->sheet->styleCells(
                    $coordinate,
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => "FFA500"]
                        ]
                    ]
                );
            }


                ////зачистка от меток цвета
            $event->sheet->getCell($coordinate)->setValue(str_replace("[orange]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[black]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[green]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[lightgreen]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[red]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[yellow]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(str_replace("[#ff8c8a]","",$event->sheet->getCell($coordinate)->getValue()));
            $event->sheet->getCell($coordinate)->setValue(strip_tags(html_entity_decode($event->sheet->getCell($coordinate)->getValue())));

        }


//        $event->sheet->getCell('B3')->setValue("[]".$event->sheet->getCell('B3')->getValue());


        ////////////////////шрифты
        $event->sheet->styleCells(
            'A2:BC2',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  14,
                    'bold'      =>  true,
                    'color' => ['argb' => '000000'],
                ],

            ]
        );

        /*
        $event->sheet->styleCells(
            'A1',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  20,
                    'bold'      =>  true,
                    'color' => ['argb' => '000000'],
                ],

            ]
        );



   /*
        $event->sheet->getStyle('A3:AA3')->getAlignment()->setWrapText(true);
        $event->sheet->getStyle('A4:AA4')->getAlignment()->setWrapText(true);
        $event->sheet->getStyle('A5:AA5')->getAlignment()->setWrapText(true);
        $event->sheet->getStyle('A6:AA6')->getAlignment()->setWrapText(true);
        $event->sheet->getStyle('A7:AA7')->getAlignment()->setWrapText(true);
        $event->sheet->mergeCells('A2:K2');
        $event->sheet->mergeCells('L2:P2');
        $event->sheet->mergeCells('Q2:X2');
        $event->sheet->mergeCells('Y2:AA2');
        $event->sheet->mergeCells('A1:AA1');

        ////////////////////шрифты
        $event->sheet->styleCells(
            'A1',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  20,
                    'bold'      =>  true,
                    'color' => ['argb' => '000000'],
                ],

            ]
        );


        $event->sheet->styleCells(
            'C5:AA5',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => '00FF00'],
                ],

            ]
        );

        $event->sheet->styleCells(
            'C6:AA6',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => 'ff8c00'],
                ],

            ]
        );

        $event->sheet->styleCells(
            'C7:AA7',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],

                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'color' => ['argb' => 'FF0000'],
                ],

            ]
        );

        ///////////////////фоны заливки

        $event->sheet->styleCells(
            'A2:AC2',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => "d9d9d9"]
                ]
            ]
        );


        $event->sheet->styleCells(
            'A3:AA3',
            [
                'font' => [
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  true,
                    'color' => ['argb' => '000000'],
                ],
            ]
        );


        $event->sheet->styleCells(
            'A5:B5',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => "00FF00"]
                ]
            ]
        );

        $event->sheet->styleCells(
            'A6:B6',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => "FFFF00"]
                ]
            ]
        );


        $event->sheet->styleCells(
            'A7:B7',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => "FF0000"]
                ]
            ]
        );

        $event->sheet->styleCells(
            'A5:AA25',
            [
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                ]
            ]
        );



        $event->sheet->getStyle('A2:AA25')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
*/
        /*
        $event->sheet->styleCells(
            'A2',
            [
                'alignment' => [
                    'setWrapText' => true
                ],

            ]
        );
*/
        //Single Column

        /* $event->sheet->styleCells(
             'A1',
             [
                 'alignment' => [
                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                 ],
                 'fill' => [
                     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                     'color' => ['argb' => "FF0000"]
                 ]
             ]
         );

 //Range Columns
         $event->sheet->styleCells(
             'B2:E2',
             [
                 'alignment' => [
                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                 ],
                 'fill' => [
                     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                     'color' => ['argb' => "d9d9d9"]
                 ]
             ]
         );
        */
    }
}
