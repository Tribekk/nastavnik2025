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
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});

class UserProfileExport implements WithColumnWidths, FromArray, WithEvents, WithHeadings
{
    private $user_profile_id;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id) {

        $this->user_profile_id=$id;
    }



    public function columnWidths(): array
    {
        return [
            'A' => 10,

        ];
    }

    public function headings(): array
    {
        return [
            ['Итоговые показатели соответствия профилю'],
            ['', '', '', '', '', '', '', '', '', '', '', 'БАЗОВЫЙ ТЕСТ','','','','','УГЛУБЛЕННЫЙ ТЕСТ',''
                ,'','','','','','','КОНСУЛЬТАЦИЯ'],
            ['Соответствие базовому профиля',
                'Соответсвие целевому профилю',
                'Любимые предметы',
                'Средний балл',
                'Видение будущего',
                'Вероятность остаться в родном городе',
                'Ограничивающие особенности здоровья',
                'Какими качествами себя охарактеризуешь',
                'Мотивы выбора',
                'Отношение к идее заключения договора целевого обучения',
                'Готовность к выбору профессии',
                'Пройден / Не пройден',
                'Проф интересы',
                'Портрет личности',
                'Рекомендуемые сферы и профессии (типаж)',
                'Выбор по матрице профессий',
                'Пройден / Не пройден',
                'Склонности',
                'Общий уровень интеллекта',
                'Тип мышления',
                'Готовность отвечать за свои действия, добросовестно относиться к работе',
                'Социальная активность. Часто характерны:',
                'Тенденция к заниженной или завышенной самооценке',
                'Конфликтность, умение решать сложные ситуации',
                'Ребенок получил консультацию',
                'Заключение профориентолога',
                'Согласие на целевое обучение'
            ],

            [
                'Соответсвует базовому портрету/Частично соответствует базовому портрету/Не соответствует базовому портрету',
                'Соответсвует целевому профилю/Частично соответствует целевому профилю/Частично соответствует целевому профилю',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                'УКАЗАН % ЗАВЕРШЕНИЯ (0-100%)',
                '',
                '',
                '',
                '',
                'УКАЗАН % ЗАВЕРШЕНИЯ (0-100%)',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',

                'Рекомендован / Не рекомендован',
                'Согласен / Не согласен / Думают',
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

    public function getAnketQuestions($findedProfile) {
        $anketItems=$findedProfile->anketItems()->get();
        $control_values=$anketItems[0]->control_values;
        $control_values=$this->unserialise($control_values);

        return $control_values;
    }

    public function getBaseTestItems($findedProfile) {
        ////вопросы базового теста
        $baseTestItems=$findedProfile->baseTestItems()->get();
        $control_values=$baseTestItems[0]->control_values;
        $control_values=$this->unserialise($control_values);

        return $control_values;
    }

    public function getDeepTestItems($findedProfile) {
        ////вопросы углубленного теста
        $deepTestItems=$findedProfile->deepTestItems()->get();
        $control_values=$deepTestItems[0]->control_values;
        $control_values=$this->unserialise($control_values);

        return $control_values;
    }

    public function getConsultInfo($findedProfile) {
        ///консультация
        $consultResults=$findedProfile->consultResults()->get();
        $control_values=$consultResults[0]->control_values;
        $control_values=$this->unserialise($control_values);

        return $control_values;
    }

    protected function getAnswersAsLine($question_id,$control_values) {
        $result['green']="";
        $result['yellow']="";
        $result['red']="";

        $question=Question::find($question_id);

        foreach($this->getTypes() as $type) {
            foreach($question->answers()->get() as $answer) {
                if(@$control_values[$type][$answer->id]==1) {
                    $result[$type]=$result[$type].$answer->title."\r\n ";
                }
            }
        }

        return $result;
    }


    protected function getFavoriteLessonInfo($control_values) {
        //////////любимый предмет
        $question_id=82;

        $result=$this->getAnswersAsLine($question_id,$control_values);

        return $result;
    }


    protected function getMediumBall($control_values) {

        $question_id=83;
        $result=$this->getAnswersAsLine($question_id,$control_values);

        return $result;
    }

    protected function getFutureView($control_values)
    {

        $question_id = 88;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getOwnCityStay($control_values) {
        $question_id = 90;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getLimitHealth($control_values) {
        $question_id = 91;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getPersonalCharacters($control_values) {
        $question_id = 92;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getMotivation($control_values) {
        $question_id = 101;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getTargetOrder($control_values) {
        $question_id = 104;

        $result = $this->getAnswersAsLine($question_id, $control_values);

        return $result;
    }

    protected function getBaseTestProfInterests($control_values) {

        @$prof_interest=$control_values["prof_interest"];
        $prof_interest_string="";

        $prof_types['phys']['title'] = 'Физико–математический тип';
        $prof_types['himbio']['title'] = 'Химико-биологический тип';
        $prof_types['digital']['title'] = 'Цифровой тип';
        $prof_types['tehno']['title'] = 'Технический тип';
        $prof_types['geograph']['title'] = 'Геолого-географический тип';
        $prof_types['filolog']['title'] = 'Филологический тип';
        $prof_types['socpol']['title'] = 'Социально-политический тип';
        $prof_types['gumanit']['title'] = 'Гуманитарный тип';
        $prof_types['soceconom']['title'] = 'Социально-экономический тип';
        $prof_types['hudestet']['title'] = 'Художественно-эстетический тип';
        $prof_types['army_sport']['title'] = 'Оборонно-спортивный тип';


        foreach($this->getTypes() as $type) {

            foreach($prof_types as $prof_type=>$prof_type_title) {


                if(@$prof_interest[$prof_type][$type]==1) {
                    @$prof_interest_string[$type]=@$prof_interest_string[$type].$prof_type_title['title']." (".$prof_interest[$prof_type]['start'][$type] ." - ". $prof_interest[$prof_type]['end'][$type].")\r\n";
                }
            }


        }

        return $prof_interest_string;
    }

    protected function getPersonalCharactersBaseTest($control_values) {


        $titles["personal_characters"]["introversion"]="Интроверсия";
        $titles["personal_characters"]["extraversion"]="Экстраверсия";
        $titles["emotional_stability"]["stable"]="Эмоциональная устойчивость";
        $titles["emotional_stability"]["warning"]="Тревожность";
        $titles["practional"]["pract"]="Практичность";
        $titles["practional"]["open"]="Открытость";
        $titles["order_level"]["no_order"]="Несобранность";
        $titles["order_level"]["open"]="Сознательность";
        $titles["soc_position"]["obosobl"]="Обособленность";
        $titles["soc_position"]["dobro"]="Доброжелательность";



        foreach($this->getTypes() as $type) {

            foreach ($titles as $title_code => $title_sub_code_arr) {

                foreach ($title_sub_code_arr as $title_sub_code => $title_sub_code_title)

                    @$personal_characters_string[$type] = @$personal_characters_string[$type] . $titles[$title_code][$title_sub_code] . " (" . @$control_values[$title_code][$title_sub_code][$type] . ")\r\n";

            }
        }


        return $personal_characters_string;
    }

    protected function getTipag($control_values) {

        @$tipag=$control_values["tipag"];


        $tipages['phys']['title'] = 'Физико–математический';
        $tipages['himbio']['title'] = 'Химико-биологический';
        $tipages['digital']['title'] = 'Цифровой';
        $tipages['tehno']['title'] = 'Технический';
        $tipages['geograph']['title'] = 'Геолого-географический';
        $tipages['filolog']['title'] = 'Филологический';
        $tipages['socpol']['title'] = 'Социально-политический';
        $tipages['gumanit']['title'] = 'Гуманитарный';
        $tipages['soceconom']['title'] = 'Социально-экономический';
        $tipages['hudestet']['title'] = 'Художественно-эстетический';
        $tipages['army_sport']['title'] = 'Оборонно-спортивный';


        foreach($this->getTypes() as $type) {

            foreach($tipages as $tipage_code=>$title_arr) {

                if (@$tipag[$tipage_code][$type] == 1) {
                    @$tipag_string[$type] = @$tipag_string[$type] . $tipages[$tipage_code]['title'] . " (" . $tipag[$tipage_code]['start'][$type] . " - " . $tipag[$tipage_code]['end'][$type] . ")\r\n";
                }
            }
        }


        return $tipag_string;
    }

    protected function getAltComponentObjectAction($control_values) {
        ////альтернативный компонент, объект деятельности
        @$alt_components=$control_values["object_action"];

        $titles["human"]="Человек ";
        $titles["nature"]="Природные ресурсы ";
        $titles["things"]="Изделия ";
        $titles["plants"]="Растения ";
        $titles["animals"]="Животные ";
        $titles["foods"]="Еда и лекарства ";
        $titles["isscuss"]="Искусство ";
        $titles["tech"]="Техника ";
        $titles["financial"]="Финансы ";
        $titles["info"]="Информация ";


        foreach($this->getTypes() as $type) {

            foreach($alt_components as $alt_code=>$alt_component) {

                if (@$alt_component[$type] == 1) {

                    @$alt_component_string[$type] = $alt_component_string[$type] . $titles[$alt_code];

                }

            }

        }

        return $alt_component_string;
    }


    protected function getAltComponentTypeAction($control_values,$alt_component_string=array()) {
        ////альтернативный компонент, объект деятельности
        @$alt_components=$control_values["type_action"];

        $titles["uprav"]="Управление ";
        $titles["service"]="Обслуживание ";
        $titles["education"]="Образование ";
        $titles["health"]="Оздаровление ";
        $titles["creating"]="Творчество ";
        $titles["zavod"]="Производство ";
        $titles["construction"]="Конструирование ";
        $titles["research"]="Исследование ";
        $titles["security"]="Защита ";
        $titles["control"]="Контроль ";


        foreach($this->getTypes() as $type) {

            foreach($alt_components as $alt_code=>$alt_component) {

                if (@$alt_component[$type] == 1) {

                    @$alt_component_string[$type] = $alt_component_string[$type] . $titles[$alt_code];

                }

            }

        }


        return $alt_component_string;
    }

    protected function getInclinations($control_values_deep_test_items) {
        $inclinations=Inclination::all();
        $inclinations_str="";
        foreach($inclinations as $inclination) {
            foreach($inclination->types()->get() as $inclination_type) {

                foreach ($this->getTypes() as $type) {

                    if (@$control_values_deep_test_items["inclinations"][$inclination_type->id][$type] == 1) {
                        @$inclinations_str[$type] = $inclinations_str[$type] . $inclination_type->title ."(".$inclination_type->value_range.")\r\n ";
                    }

                }

            }
        }

        return $inclinations_str;
    }

    protected function getIntellegenseLevel($control_values_deep_test_items) {
        $intellegens_levels=IntelligenceLevel::all();
        $intellegense_str="";
        foreach($intellegens_levels as $intellegens_level) {


            foreach($this->getTypes() as $type) {

                if (@$control_values_deep_test_items["intellegense_level"][$intellegens_level->id][$type] == 1) {
                    @$intellegense_str[$type] = $intellegense_str[$type] . $intellegens_level->title."\r\n ";
                }

            }


        }

        return $intellegense_str;
    }

    protected function getTypeOfThinking($control_values_deep_test_items) {
        $types_of_thinking=TypeOfThinking::all();
        $type_of_thinking_str="";

        foreach($types_of_thinking as $type_of_thinking) {
            foreach($type_of_thinking->manifestations()->get() as $type_think_manifest) {

             foreach($this->getTypes() as $type) {

                    if (@$control_values_deep_test_items["type_of_thinking"][$type_think_manifest->id][$type] == 1) {
                        @$type_of_thinking_str[$type] = $type_of_thinking_str[$type] . $type_think_manifest->title ."(".$type_think_manifest->value_range.")\r\n ";
                    }

                }

            }
        }

        return $type_of_thinking_str;
    }

    protected function getSituationInterpretation($situation_id,$control_values_deep_test_items) {
        $situation_interpretation_str="";
        $situation=Situation::find($situation_id);



        foreach($situation->situation_interpretations()->get() as $situation_interpretation) {
          foreach($this->getTypes() as $type) {


                if (@$control_values_deep_test_items["situation"][$situation_interpretation->id][$type] == 1) {
                    @$situation_interpretation_str[$type] = $situation_interpretation_str[$type] . $situation_interpretation->content.")\r\n ";
                }

            }
        }

        return $situation_interpretation_str;
    }

    protected function getConsult($control_values_consult_resuls) {

        $consult_result_str=array();
        $consult=@$control_values_consult_resuls["consult"];

        foreach($this->getTypes() as $type) {

            if(@$consult[$type]==1) {
                $consult_result_str[$type]='Согласны';
            }
            if(@$consult[$type]==0) {
                $consult_result_str[$type]='Не согласны';
            }

        }

        return $consult_result_str;
    }

    protected function getFamilyConsult($control_values_consult_resuls) {
        $family=@$control_values_consult_resuls["family"];

      foreach ($this->getTypes() as $type) {

            if(@$family[$type]==1) {
                $family_result_str[$type]='Согласны';
            }
            if(@$family[$type]==0) {
                $family_result_str[$type]='Не согласны';
            }
            if(@$family[$type]==0) {
                $family_result_str[$type]='Думают';
            }

        }

        return $family_result_str;
    }


    public function array(): array
    {
        $types=$this->getTypes();
        $findedProfile=UserProfile::find($this->user_profile_id);


        ////получение всех данных
        $control_values_ankets=$this->getAnketQuestions($findedProfile);
        $control_values_base_test_items=$this->getBaseTestItems($findedProfile);
        $control_values_deep_test_items=$this->getDeepTestItems($findedProfile);
        $control_values_consult_resuls=$this->getConsultInfo($findedProfile);


       ////любимый урок
        $favorite_lessons=$this->getFavoriteLessonInfo($control_values_ankets);

       ////////////средний балы
        $medium_score=$this->getMediumBall($control_values_ankets);

        ////////////видение будущего
        $feature_view=$this->getFutureView($control_values_ankets);

        ////вероятность осттаться в родном городе
        $own_city_stay=$this->getOwnCityStay($control_values_ankets);

        ////ограничивающие особенности
        $limit_health=$this->getLimitHealth($control_values_ankets);

        ////качества
        $personal_characters=$this->getPersonalCharacters($control_values_ankets);

        ////мотивы выбора
        $motivation=$this->getMotivation($control_values_ankets);

        ////договор целевого обучения
        $target_order=$this->getTargetOrder($control_values_ankets);

        ///////базовый тест, профинтересы
        $prof_interest_string=$this->getBaseTestProfInterests($control_values_base_test_items);


        ////базовый тест, Портрет личности
        $personal_characters_string=$this->getPersonalCharactersBaseTest($control_values_base_test_items);


        /////////////////////типаж
        @$tipag_string=$this->getTipag($control_values_base_test_items);

        ////альтернативный компонент, объект деятельности
        @$alt_component_string=$this->getAltComponentObjectAction($control_values_base_test_items);
        @$alt_component_string=$this->getAltComponentTypeAction($control_values_base_test_items,$alt_component_string);


        /////наклонности
        $inclinations_str=$this->getInclinations($control_values_deep_test_items);

        /////уровень интеллекта
        $intellegense_str=$this->getIntellegenseLevel($control_values_deep_test_items);


        ///тип мышления
        $type_of_thinking_str=$this->getTypeOfThinking($control_values_deep_test_items);

        ///ситуации
        $situation_interpretation1=$this->getSituationInterpretation(1,$control_values_deep_test_items);
        $situation_interpretation2=$this->getSituationInterpretation(2,$control_values_deep_test_items);
        $situation_interpretation3=$this->getSituationInterpretation(3,$control_values_deep_test_items);
        $situation_interpretation4=$this->getSituationInterpretation(4,$control_values_deep_test_items);



        /////конультация
        $consult_result_str=$this->getConsult($control_values_consult_resuls);
        $family_result_str=$this->getFamilyConsult($control_values_consult_resuls);


        $result=[
          [
              'Соответсвует базовому портрету',
              'Соответсвует целевому профилю',
              @$favorite_lessons['green'],
              @$medium_score['green'],
              @$feature_view['green'],
              @$own_city_stay['green'],
              @$limit_health['green'],
              @$personal_characters['green'],
              @$motivation['green'],
              @$target_order['green'],
              '',
              '',
              @$prof_interest_string['green'],
              @$personal_characters_string['green'],
              @$tipag_string['green'],
              @$alt_component_string['green'],
              '',
              @$inclinations_str['green'],
              @$intellegense_str['green'],
              @$type_of_thinking_str['green'],
              strip_tags(@$situation_interpretation1['green']),
              strip_tags(@$situation_interpretation2['green']),
              strip_tags(@$situation_interpretation3['green']),
              strip_tags(@$situation_interpretation4['green']),
              '',
              @$consult_result_str['green'],
              @$family_result_str['green'],
          ],
          [
              'Частично соответствует базовому портрету','Частично соответствует целевому профилю',
              @$favorite_lessons['yellow'],
              @$medium_score['yellow'],
              @$feature_view['yellow'],
              @$own_city_stay['yellow'],
              @$limit_health['yellow'],
              @$personal_characters['yellow'],
              @$motivation['yellow'],
              @$target_order['yellow'],
              '',
              '',
              @$prof_interest_string['yellow'],
              @$personal_characters_string['yellow'],
              @$tipag_string['yellow'],
              @$alt_component_string['yellow'],
              '',
              @$inclinations_str['yellow'],
              @$intellegense_str['yellow'],
              @$type_of_thinking_str['yellow'],
              strip_tags(@$situation_interpretation1['yellow']),
              strip_tags(@$situation_interpretation2['yellow']),
              strip_tags(@$situation_interpretation3['yellow']),
              strip_tags(@$situation_interpretation4['yellow']),
              '',
              @$consult_result_str['yellow'],
              @$family_result_str['yellow'],
          ],
          [
              'Не соответствует базовому портрету',
              'Не соответствует целевому профилю',
              @$favorite_lessons['red'],
              @$medium_score['red'],
              @$feature_view['red'],
              @$own_city_stay['red'],
              @$limit_health['red'],
              @$personal_characters['red'],
              @$motivation['red'],
              @$target_order['red'],
              '',
              '',
              @$prof_interest_string['red'],
              @$personal_characters_string['red'],
              @$tipag_string['red'],
              @$alt_component_string['red'],
              '',
              @$inclinations_str['red'],
              @$intellegense_str['red'],
              @$type_of_thinking_str['red'],
              strip_tags(@$situation_interpretation1['red']),
              strip_tags(@$situation_interpretation2['red']),
              strip_tags(@$situation_interpretation3['red']),
              strip_tags(@$situation_interpretation4['red']),
              '',
              @$consult_result_str['red'],
              @$family_result_str['red'],
          ],

        ];

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
