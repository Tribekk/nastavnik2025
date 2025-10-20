<?php

namespace Domain\UserProfile\Actions;

use App\Quiz\Controllers\QuizController;
use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\IntelligenceLevel;
use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Situation;
use Domain\Quiz\Models\SituationInterpretation;
use Domain\Quiz\Models\SolutionCasesResult;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\Quiz\Models\TypeOfThinkingManifestation;
use Domain\User\Models\User;
use Domain\UserProfile\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserProfiler
{
    protected  $user_id;
    protected  $profile_id;
    public function __construct($user_id,$profile_id)
    {
        $this->profile_id=$profile_id;
        $this->user_id=$user_id;
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

    public function getAnketResults($findedProfile)
    {
        $anketItems = $findedProfile->anketResults()->get();

        $control_values = $anketItems[0]->control_values;
        $control_values = $this->unserialise($control_values);

        return $control_values;
    }

    public function getBaseTestResults($findedUser)
    {
        $QuizController = new QuizController;
        $resultThinkingTypes = $QuizController->takeUserResults($findedUser);


        $results = [];

        if (!empty($resultThinkingTypes['PersonalThinkingTypes'])) {
            foreach ($resultThinkingTypes['PersonalThinkingTypes'] as $PersonalResult) {
                $short_title = $PersonalResult->type['short_title'];

                $results['personal_characters'][$short_title] = $PersonalResult['percentage'];
            }
            $results['personal_characters']['result'] = $resultThinkingTypes['PersonalThinkingTypesAverage'];
        }

        if (!empty($resultThinkingTypes['ProfessionalThinkingTypes'])) {
            foreach ($resultThinkingTypes['ProfessionalThinkingTypes'] as $ProfessionalResult) {
                $short_title = $ProfessionalResult->type['short_title'];

                $results['prof_characters'][$short_title] = $ProfessionalResult['percentage'];
            }
            $results['prof_characters']['result'] = $resultThinkingTypes['ProfessionalThinkingTypesAverage'];
        }

        if (isset($results['personal_characters']['result']) && isset($results['prof_characters']['result'])){

            $results['result_characters'] = $resultThinkingTypes['typeThinkingValuesEndAverage'];
        }

        return $results;
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


    public function getDeepTestResults($findedProfile) {
        ////вопросы углубленного теста
        $deepTestItems=$findedProfile->deepTestResults()->get();
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
                    @$tipag_string[$type] = @$tipag_string[$type] . $tipages[$tipage_code]['title'] . "\r\n";
//                    @$tipag_string[$type] = @$tipag_string[$type] . $tipages[$tipage_code]['title'] . " (" . $tipag[$tipage_code]['start'][$type] . " - " . $tipag[$tipage_code]['end'][$type] . ")\r\n";
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

        $consult=$control_values_consult_resuls["consult"];

        foreach($this->getTypes() as $type) {

            if($consult[$type]==1) {
                $consult_result_str[$type]='Согласны';
            }
            if($consult[$type]==0) {
                $consult_result_str[$type]='Не согласны';
            }

        }

        return $consult_result_str;
    }

    protected function getFamilyConsult($control_values_consult_resuls) {
        $family=$control_values_consult_resuls["family"];

        foreach ($this->getTypes() as $type) {

            if($family[$type]==1) {
                $family_result_str[$type]='Согласны';
            }
            if($family[$type]==0) {
                $family_result_str[$type]='Не согласны';
            }
            if($family[$type]==0) {
                $family_result_str[$type]='Думают';
            }

        }

        return $family_result_str;
    }

    public function inInterval($interval_string, $value, $field_name = '')
    {


        ////приводим значение к инту
        $value = (int) round($value * 1);

        if (is_array($interval_string)) {
            $interval_array = &$interval_string;
            if (in_array($value, $interval_array)) return true;


            if (!empty($field_name) && key_exists($field_name, $interval_array ) && key_exists('start', $interval_array[$field_name]) && key_exists('end', $interval_array[$field_name]) && $value >= $interval_array[$field_name]["start"] && $value <= $interval_array[$field_name]["end"]){
                return true;
            }

            if (key_exists($value, $interval_array)) return true;
            return false;
        } else {
            ///удаляем пробелы
            $interval_string = str_replace(" ", "", $interval_string);


            ///проверяем по интервалу
            $interval_string = explode("-", $interval_string);

            if (isset($interval_string[0]) and isset($interval_string[1])) {

                if ($value >= $interval_string[0] and $value <= $interval_string[1]) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }


    public function professional_type_id_to_code($professional_type_id) {
        if($professional_type_id==1) {
            $profession_code="phys";
        }
        if($professional_type_id==2) {
            $profession_code="himbio";
        }
        if($professional_type_id==3) {
            $profession_code="soceconom";
        }
        if($professional_type_id==4) {
            $profession_code="socpol";
        }
        if($professional_type_id==5) {
            $profession_code="filolog";
        }
        if($professional_type_id==6) {
            $profession_code="gumanit";
        }
        if($professional_type_id==7) {
            $profession_code="hudestet";
        }
        if($professional_type_id==8) {
            $profession_code="digital";
        }
        if($professional_type_id==9) {
            $profession_code="geograph";
        }
        if($professional_type_id==10) {
            $profession_code="tehno";
        }
        if($professional_type_id==11) {
            $profession_code="army_sport";
        }

        return $profession_code;
    }


    public function professional_object_id_to_code($activity_objects) {
        if($activity_objects==1) {
            $activity_objects_code="human";
        }

        if($activity_objects==2) {
            $activity_objects_code="info";
        }

        if($activity_objects==3) {
            $activity_objects_code="financial";
        }

        if($activity_objects==4) {
            $activity_objects_code="tech";
        }

        if($activity_objects==5) {
            $activity_objects_code="isscuss";
        }

        if($activity_objects==6) {
            $activity_objects_code="animals";
        }

        if($activity_objects==7) {
            $activity_objects_code="plants";
        }

        if($activity_objects==8) {
            $activity_objects_code="foods";
        }

        if($activity_objects==9) {
            $activity_objects_code="things";
        }

        if($activity_objects==10) {
            $activity_objects_code="nature";
        }


        return $activity_objects_code;
    }

    public function run()
    {
        $types=$this->getTypes();

        ///получение профиля
        $findedProfile=Models\UserProfile::find($this->profile_id);

        ///получение пользователя
        $findedUser=User::find($this->user_id);
        $isStudent=$findedUser->getIsStudentAttribute();
        $result = [];
        if($isStudent==false){
            return false;
        } else {

            ///////////////////////////////////////////////////////////////
            /// Вопросы и тесты по модели компетенций
            /// ///////////////////////////////////////////////////////////
            $BaseTestItems = $this->getBaseTestItems($findedProfile);
            $BaseTestResults = $this->getBaseTestResults($findedUser);

            @$result['personal_characters']['result']["description"] = '';
            @$result['personal_characters']['result']["background_color"] = '#ffffff';

            @$result['prof_characters']['result']["description"] = '';
            @$result['prof_characters']['result']["background_color"] = '#ffffff';

            if (!empty($BaseTestItems) && !empty($BaseTestResults)) {
                foreach ($BaseTestItems as $type_result => $baseTestTypes) {
                    foreach ($baseTestTypes as $field_name => $baseTestType) {

                        $is_exist = false;
                        foreach ($this->getTypes() as $type) {
                            if ($this->inInterval([$field_name => $baseTestType[$type]], $BaseTestResults[$type_result][$field_name], $field_name)) {
                                @$result[$type_result][$field_name][$type] = $BaseTestResults[$type_result][$field_name];
                                if (!empty($result[$type_result]['result'])){
                                    if ($type === 'green') {
                                        @$result[$type_result]['result']["description"] = 'Соответсвует';
                                        @$result[$type_result]['result']["background_color"] = 'lightgreen';
                                    } elseif ($type === 'yellow') {
                                        @$result[$type_result]['result']["description"] = 'Частично соответсвует';
                                        @$result[$type_result]['result']["background_color"] = 'yellow';
                                    } elseif ($type === 'red') {
                                        @$result[$type_result]['result']["description"] = 'Не сответсвует';
                                        @$result[$type_result]['result']["background_color"] = '#ff8c8a';
                                    }
                                }
                                $is_exist = true;
                            }
                        }

                        if (!$is_exist) {
                            @$result[$type_result][$field_name]["black"] = $BaseTestResults[$type_result][$field_name];
                            if (!empty($result[$type_result]['result'])){
                                @$result[$type_result]['result']["description"] = $BaseTestResults[$type_result][$field_name];
                                @$result[$type_result]['result']["background_color"] = '#ffffff';
                            }
                        }

                    }
                }
            } elseif (!empty($BaseTestResults)) {
                foreach ($BaseTestResults as $type_result => $baseTestResult) {
                    if (is_array($baseTestResult))
                        foreach ($baseTestResult as $field_name => $valueTestResult) {
                            @$result[$type_result][$field_name]["black"] = $valueTestResult;
                            if (!empty($result[$type_result]['result'])){
                                @$result[$type_result]['result']["description"] = $BaseTestResults[$type_result][$field_name];
                                @$result[$type_result]['result']["background_color"] = '#ffffff';
                            }
                        }
                }
            }


            $field_name = "result_characters";
            @$result[$field_name]['result']["description"] = '';
            @$result[$field_name]['result']["background_color"] = '#ffffff';

            if (key_exists('result_characters', $BaseTestResults)){

                $profile_result_characters = $this->getAnketResults($findedProfile);
                $is_exist = false;
                if (!empty($profile_result_characters)) {
                    foreach ($this->getTypes() as $type) {

                        if ($this->inInterval([$field_name => $profile_result_characters["result_characters"]["result"][$type]], $BaseTestResults["result_characters"], $field_name)) {

                            $result[$field_name][$type] = $BaseTestResults["result_characters"];

                            if ($type === 'green') {
                                @$result[$field_name]['result']["description"] = 'Соответсвует';
                                @$result[$field_name]['result']["background_color"] = 'lightgreen';
                            } elseif ($type === 'yellow') {
                                @$result[$field_name]['result']["description"] = 'Частично соответсвует';
                                @$result[$field_name]['result']["background_color"] = 'yellow';
                            } elseif ($type === 'red') {
                                @$result[$field_name]['result']["description"] = 'Не сответсвует';
                                @$result[$field_name]['result']["background_color"] = '#ff8c8a';
                            }


                            $is_exist = true;
                        }

                    }
                }

                if (!$is_exist){
                    $result[$field_name]["black"] = $BaseTestResults["result_characters"];
                    @$result[$field_name]['result']["description"] = $BaseTestResults["result_characters"];
                }

            }

            /////Достаточная готовность выбора профессии
            if ($findedUser->getStudentQuestionnaireFinishedAttribute()) {
                //dd($findedUser->studentQuestionnaireResult()->get());
            }

            ///////////////////////////////////////////////////////////////
            /// Степень соответствия общим данным (анкета) general_data
            /// ///////////////////////////////////////////////////////////
            $QuizController = new QuizController();
            $QuizzesResults = $QuizController->takeUserResults($findedUser);
            $questionnaireResultValue = !empty($QuizzesResults['questionnaireResult']) ? $QuizzesResults['questionnaireResult']->willingness_to_choose_profession_score : 0;
            $control_values_anketsItems = $this->getAnketQuestions($findedProfile);

            $field_name = 'general_data';
            @$result[$field_name]["background_color"] = '#ffffff';
            @$result[$field_name]["description"] = '';

            if (!empty($questionnaireResultValue)) {
                $is_exist = false;
                if (!empty($control_values_anketsItems)) {
                    foreach ($this->getTypes() as $type) {
                        if ($this->inInterval($control_values_anketsItems[$type], $questionnaireResultValue, $field_name)) {
                            @$result[$field_name][$type] = $questionnaireResultValue;

                            if ($type === 'green') {
                                @$result[$field_name]["description"] = 'Соответсвует';
                                @$result[$field_name]["background_color"] = 'lightgreen';
                            } elseif ($type === 'yellow') {
                                @$result[$field_name]["description"] = 'Частично соответсвует';
                                @$result[$field_name]["background_color"] = 'yellow';
                            } elseif ($type === 'red') {
                                @$result[$field_name]["description"] = 'Не сответсвует';
                                @$result[$field_name]["background_color"] = '#ff8c8a';
                            }

                            $is_exist = true;
                        }
                    }
                }

                if ($is_exist == false) {
                    @$result[$field_name]["black"] = $questionnaireResultValue;
                    @$result[$field_name]["description"] = $questionnaireResultValue;

                }
            }

            $anket_questions = [
                434 => 'education_level', // Уровень образования
                435 => 'cat_employee', // Категория сотрудника
                436 => 'profession', // Профессия
                437 => 'skill_profession', //Квалификация по профессии
                438 => 'total_experience', //Общий стаж работы
                439 => 'experience_company', //Стаж работы в компании
                440 => 'experience_company_position', //Стаж работы в компании в текущей профессии/должности
                441 => 'mentoring_experience', //Ваш опыт наставничества
            ];

            foreach ($anket_questions as $question_id => $field_name) {
                // Уровень образования
                if (!empty($res = $this->getAnketWithProfileResults($question_id, $findedUser, $findedProfile))) {

                    $result[$field_name] = $res;
                    foreach ($res as $type => $re) {
                        $result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
                    }
                }
            }

            ///////////////////////////////////////////////////////////////
            ///вероятность остаться в родном городе
            /// ///////////////////////////////////////////////////////////
            $question_id = 90;
            $question = Question::find($question_id);

            if (!is_null(@$question->userAnswers($findedUser)[0])) {

                $user_answer = $question->userAnswers($findedUser)[0]->answer()->get();

                $control_values_ankets = $this->getAnketResults($findedProfile);
                $control_values_anketsItems = $this->getAnketQuestions($findedProfile);
                $deepTestResults = $this->getDeepTestResults($findedProfile);
                $deepTestItems = $this->getDeepTestItems($findedProfile);
                $baseTestItems = $this->getBaseTestItems($findedProfile);


                ///ответ ученика
                @$ownCityIntervals = $control_values_ankets["own_city"];

                if (!empty($ownCityIntervals)) {
                    $ownCityUserResult = $user_answer->first()->title;
                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {

                        /////вероятность остаться в родном городе
                        @$ownCityInterval = $ownCityIntervals[$type];

                        if ($this->inInterval($ownCityInterval, $ownCityUserResult)) {
                            @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
                            @$result["own_city"][$type] = $ownCityUserResult;
                            $is_exist = true;
                        }


                    }

                    if ($is_exist == false) {
                        @$result["own_city"]["black"] = $ownCityUserResult;
                    }
                }
            }


            ///////////////////////////////////////////////////////////////////////
            ////////////////типаж, что сохранено в профиле
            /// ///////////////////////////////////////////////////////////////
            @$tipages = $control_values_ankets["tipag"];

            if (!is_null(@$findedUser->personTypes())) {

                if (!empty($tipages)) {
                    /////////////ответ ученика
                    foreach ($findedUser->personTypes() as $personType) {

                        $is_exist = false;

                        foreach ($this->getTypes() as $type) {

                            $professional_type_id = $personType->type_id;

                            $value = $personType->value;

                            $professional_code = $this->professional_type_id_to_code($professional_type_id);

                            if (@$tipages[$professional_code][$type] == 1) {
                                @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;

                                $professional_type = ProfessionalType::find($professional_type_id);
                                @$result["tipag"][$type][] = @$professional_type->title;
//                                @$result["tipag"][$type][] = @$professional_type->title . " (" . $value . ")";
                                $is_exist = true;
                            }


                        }

                        if ($is_exist == false) {
                            $professional_type = ProfessionalType::find($professional_type_id);
                            @$result["tipag"]["black"][] = @$professional_type->title;
//                            @$result["tipag"]["black"][] = @$professional_type->title . " (" . $value . ")";
                        }

                    }
                }

            }


            ////////////////////////////////////////////////////
            ////////////////////альтернативный компонент
            /////////////////////////////////////////////////

            @$alt_components = $control_values_ankets["object_action"];

            if (!empty($alt_components)) {

                if (!is_null($findedUser->suitableProfessions()->first())) {

                    @$activity_object_id = $findedUser->suitableProfessions()->first()->careerMatrix()->first()->activity_object_id;
                    @$activity_kind_id = $findedUser->suitableProfessions()->first()->careerMatrix()->first()->activity_kind_id;

                    if (!empty($activity_object_id)) {

                        $alt_component_code = $this->professional_object_id_to_code($activity_object_id);

                        $is_exist = false;

                        foreach ($this->getTypes() as $type) {


                            if (@$alt_components[$alt_component_code][$type] == 1) {
                                @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;

                                $activity_object = ActivityObject::find($activity_object_id);
                                if (!empty($activity_kind_id)) {
                                    $activity_kind = ActivityKind::find($activity_kind_id);
                                } else {
                                    $activity_kind = "";
                                }

                                @$result["alt_component"][$type] = $activity_object->title . " + " . $activity_kind->title;
                                $is_exist = true;
                            }

                        }


                        if ($is_exist == false) {
                            $activity_object = ActivityObject::find($activity_object_id);
                            $activity_kind = ActivityKind::find($activity_kind_id);

                            @$result["alt_component"]["black"] = $activity_object->title . " + " . $activity_kind->title;

                        }
                    }

                }
            }


            ////////////////////////////////////////////////////
            //////////////////склонности////////////////////////
            ////////////////////////////////////////////////////
            @$inclinations = $deepTestResults["inclinations"];

            if (!empty($inclinations)) {

                if (!is_null($findedUser->inclinationResult()->first())) {
                    foreach ($findedUser->inclinationResult()->first()->values()->get() as $inclination) {


                        $inclination_id = $inclination->inclination_id;
                        $value = $inclination->value;

                        $inclination_object = Inclination::find($inclination_id);


                        $is_exist = false;
                        foreach ($this->getTypes() as $type) {


                            if (@$inclinations[$inclination_id][$type] == 1) {
                                @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
//                                $result["inclinations"][$type][] = $inclination_object->title . " (" . $value . ")";
                                $result["inclinations"][$type][] = $inclination_object->title ;
                                $is_exist = true;
                            }


                        }

                        if ($is_exist == false) {
//                            $result["inclinations"]['black'][] = $inclination_object->title . " (" . $value . ")";
                            $result["inclinations"]['black'][] = $inclination_object->title;
                        }


                    }
                }

            }


            /////////////////////////////////////////////////////////////
            /// типы мышления ///////////////////////////////////////////
            /////////////////////////////////////////////////////////////

            @$type_of_thinking = $deepTestResults["type_of_thinking"];


            if (!empty($type_of_thinking)) {

                if (!is_null($findedUser->typeOfThinkingResult()->first())) {


                    foreach ($findedUser->typeOfThinkingResult()->first()->values()->get() as $type_of_think) {

                        $is_exist = false;
                        $manifestation_id = $type_of_think->manifestation_id;
                        $value = $type_of_think->value;
                        $manifestation_object = TypeOfThinkingManifestation::find($manifestation_id);
                        $think_type = TypeOfThinking::find($type_of_think->type_id);

                        foreach ($this->getTypes() as $type) {

                            if (@$type_of_thinking[$manifestation_id][$type] == 1) {
                                @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
                                $result["type_of_thinking"][$type] = $think_type->title . " - " . $manifestation_object->title;
//                                $result["type_of_thinking"][$type] = $think_type->title . " - " . $manifestation_object->title . " (" . $value . ")";
                            }
                        }

                        if ($is_exist == true) {
//                            $result["type_of_thinking"]["black"] = $think_type->title . " - " . $manifestation_object->title . " (" . $value . ")";
                            $result["type_of_thinking"]["black"] = $think_type->title . " - " . $manifestation_object->title;
                        }

                    }
                }

            }


            ////////////////////////////////////////////////////////
            /// //////////уровень интелекта/////////////////////////
            ////////////////////////////////////////////////////////

            @$intellegens_levels_type = $deepTestResults["intellegense_level"];


            if (!empty($intellegens_levels_type)) {
                foreach ($findedUser->intelligenceLevelResult()->get() as $intelegense_level) {


                    $intelegense_level_id = $intelegense_level->level()->get()->first()->id;

                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {
                        if (@$intellegens_levels_type[$intelegense_level_id][$type] == 1) {
                            @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
                            @$result['intellegense_level'][$type] = $intelegense_level->level()->get()->first()->title;
                            $is_exist = true;
                        }
                    }

                    if ($is_exist == false) {
                        @$result['intellegense_level']['black'] = $intelegense_level->level()->get()->first()->title;
                    }
                }

            }


            //////решение ситуаций
            @$situation = $deepTestItems["situation"];

            if (!empty($situation)) {


                foreach ($findedUser->solutionOfCasesResult()->get() as $situation_value) {


                    foreach ($situation_value->values()->get() as $solution_case_result) {
                        $sitatuion = $solution_case_result->situation()->get()->first();
                        $sitatuion_interpretation = $solution_case_result->interpretation()->get()->first();

                        $is_exist = false;

                        foreach ($this->getTypes() as $type) {

                            if (@$situation[$sitatuion->id][$type] == 1) {
                                $result['situation'][$sitatuion->id][$type] = $sitatuion_interpretation->content;
                                $is_exist = true;
                            }
                        }

                        if ($is_exist == false) {
                            $result['situation'][$sitatuion->id]["black"] = $sitatuion_interpretation->content;
                        }


                    }

                }
            }


            //  echo "id=".$situation_object->$interpretation_id."=".$situation_object->content."<br>";



            /////вывод общего результата
            @$result_color = $result['total_score'];

            if (!empty($result_color)) {
                arsort($result_color);
                $result["color"] = array_key_first($result_color);
                if ($result["color"] == "") {
                    $result["color"] = "red";
                }
            } else {
                $result["color"] = "white";
            }


            //////////////////////////////////////////////////////////
            //////////////////////Любимые предметы////////////////////
            /// //////////////////////////////////////////////////////
            $question_id = 82;
            $question = Question::find($question_id);
            @$favoriteLessonsInfo = $this->getFavoriteLessonInfo($control_values_anketsItems);

            if (!is_null(@$question->userAnswers($findedUser)[0]) and !is_null($favoriteLessonsInfo)) {

                $user_answers = $question->userAnswers($findedUser)[0]->answer()->get();
                foreach ($question->userAnswers($findedUser) as $user_answers) {

                    foreach ($user_answers->answer()->get() as $user_answer) {

                        $is_exist = false;
                        foreach ($this->getTypes() as $type) {
                            $favoriteLessonsAnswer = $favoriteLessonsInfo[$type];
                            $favoriteLessonsAnswer_arr = explode("\r\n", $favoriteLessonsAnswer);
                            foreach ($favoriteLessonsAnswer_arr as $favoriteLessonsAnswer_item) {
                                $favoriteLessonsAnswer_item = trim($favoriteLessonsAnswer_item);
                                if ($favoriteLessonsAnswer_item == $user_answer->title) {
                                    @$result["favorite_lessons"][$type][] = $user_answer->title;
                                    $is_exist = true;
                                }
                            }

                        }

                        if ($is_exist == false) {
                            @$result["favorite_lessons"]["black"][] = $user_answer->title;
                        }

                    }
                }
            }


            ///////////////////////////////////////////////////
            ///////////////Средний балл////////////////////////
            /// ///////////////////////////////////////////////
            $question_id = 83;
            $question = Question::find($question_id);
            @$mediumScores = $this->getMediumBall($control_values_anketsItems);

            if (!is_null(@$question->userAnswers($findedUser)[0]) and !is_null($mediumScores)) {

                $user_answer = $question->userAnswers($findedUser)[0]->answer()->first();
                ///$result["medium_score"]=$user_answer->first()->title;


                $is_exist = false;
                foreach ($this->getTypes() as $type) {
                    $mediumScore = $mediumScores[$type];


                    $mediumScore_arr = explode("\r\n", $mediumScore);
                    foreach ($mediumScore_arr as $mediumScore_item) {
                        $mediumScore_item = trim($mediumScore_item);
                        if ($mediumScore_item == $user_answer->title) {
                            @$result["medium_score"][$type][] = $user_answer->title;
                            $is_exist = true;
                        }
                    }

                }

                if ($is_exist == false) {
                    @$result["medium_score"]["black"][] = $user_answer->title;
                }
            }


            ///////////////////////////////////////////////////////////////////////
            /////////////////Видение будущего//////////////////////////////////////
            /// ///////////////////////////////////////////////////////////////////
            $question_id = 88;
            $question = Question::find($question_id);
            @$futureViews = $this->getFutureView($control_values_anketsItems);


            if (!is_null(@$question->userAnswers($findedUser)[0]) and !is_null($futureViews)) {

                $user_answers = $question->userAnswers($findedUser)[0]->answer()->get();

                foreach ($user_answers as $user_answer) {

                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {
                        $futureView = $futureViews[$type];
                        $futureView_arr = explode("\r\n", $futureView);
                        foreach ($futureView_arr as $futureView_item) {
                            $futureView_item = trim($futureView_item);
                            if ($futureView_item == $user_answer->title) {
                                @$result["future_view"][$type][] = $user_answer->title;
                                $is_exist = true;
                            }
                        }

                    }

                    if ($is_exist == false) {
                        @$result["future_view"]["black"][] = $user_answer->title;
                    }

                }
            }

            ///////////////////////////////////////////////////////////////
            ///////////ограничиваюющие факторы здоровья////////////////////
            /// ///////////////////////////////////////////////////////////
            $question_id = 91;
            $question = Question::find($question_id);
            @$limitHealths = $this->getLimitHealth($control_values_anketsItems);

            if (!is_null(@$question->userAnswers($findedUser)[0]) and !is_null($limitHealths)) {

                $user_answers = $question->userAnswers($findedUser)[0]->answer()->get();


                foreach ($user_answers as $user_answer) {

                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {
                        $limitHealth = $limitHealths[$type];
                        $limitHealth_arr = explode("\r\n", $limitHealth);

                        foreach ($limitHealth_arr as $limit_health_item) {
                            $limit_health_item = trim($limit_health_item);
                            if ($limit_health_item == $user_answer->title) {
                                @$result["limit_health"][$type][] = $user_answer->title;
                                $is_exist = true;
                            }
                        }

                    }

                    if ($is_exist == false) {
                        @$result["limit_health"]["black"][] = $user_answer->title;
                    }

                }
            }


            ////////////////////////////////////////////////////////////////
            //////////////////////какими качествами себя характеризуешь/////
            /// ////////////////////////////////////////////////////////////
            $question_id = 92;
            $question = Question::find($question_id);
            @$personalCharacters = $this->getPersonalCharacters($control_values_anketsItems);

            if (!is_null(@$question->userAnswers($findedUser)[0]) and !is_null($personalCharacters)) {

//                $user_answers = $question->userAnswers($findedUser)[0]->answer()->get();
                foreach ($question->userAnswers($findedUser) as $user_answers) {
                    foreach ($user_answers->answer()->get() as $user_answer) {

                        $is_exist = false;
                        foreach ($this->getTypes() as $type) {
                            $personalCharacter = $personalCharacters[$type];
                            $personalCharacter_arr = explode("\r\n", $personalCharacter);

                            foreach ($personalCharacter_arr as $personalCharacter_item) {
                                $personalCharacter_item = trim($personalCharacter_item);
                                if ($personalCharacter_item == $user_answer->title) {
                                    @$result["personal_character"][$type][] = $user_answer->title;
                                    $is_exist = true;
                                }
                            }

                        }

                        if ($is_exist == false) {
                            @$result["personal_character"]["black"][] = $user_answer->title;
                        }

                    }
                }
            }


            /////////////////////////////////////////////////////////////////
            //////////////////////////мотивы выбора//////////////////////////
            /// /////////////////////////////////////////////////////////////
            $question_id = 101;
            $question = Question::find($question_id);
            @$motivations = $this->getMotivation($control_values_anketsItems);

            if (!is_null(@$question->userAnswers($findedUser)) and !is_null($motivations)) {

                $user_answers = $question->userAnswers($findedUser);


                foreach ($user_answers as $user_answer) {

                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {
                        $motivation = $motivations[$type];
                        $motivation_arr = explode("\r\n", $motivation);

                        foreach ($motivation_arr as $motivation_item) {
                            $motivation_item = trim($motivation_item);

                            if ($motivation_item == $user_answer->answer()->first()->title) {
                                @$result["motivations"][$type][] = $user_answer->answer()->first()->title;
                                $is_exist = true;
                            }
                        }

                    }

                    if ($is_exist == false) {
                        @$result["motivations"]["black"][] = $user_answer->answer()->first()->title;
                    }

                }
            }


            ////////////////////////////////////////////////////////////
            /////////////////////////////отношение к заключению договора
            /// /////////////////////////////////////////////////////////
            $question_id = 104;
            $question = Question::find($question_id);

            @$user_answers = $question->userAnswers($findedUser);

            @$targetOrders = $this->getTargetOrder($control_values_anketsItems);

            if (!is_null($targetOrders) and !is_null($user_answers)) {

                foreach ($user_answers as $user_answer) {

                    $is_exist = false;
                    foreach ($this->getTypes() as $type) {
                        $targetOrder = $targetOrders[$type];
                        $targetOrder_arr = explode("\r\n", $targetOrder);

                        foreach ($targetOrder_arr as $targetOrder_item) {
                            $targetOrder_item = trim($targetOrder_item);

                            if ($targetOrder_item == $user_answer->answer()->first()->title) {
                                @$result["targetOrder"][$type][] = $user_answer->answer()->first()->title;
                                $is_exist = true;
                            }
                        }

                    }

                    if ($is_exist == false) {
                        @$result["targetOrder"]["black"][] = $user_answer->answer()->first()->title;
                    }

                }
            }

            ///////////////////////////////////////////////////////////////////////////////
            /// ///////готовность к выбору профессии//////////////////////////////////////
            /// //////////////////////////////////////////////////////////////////////////
            @$readyProfessionSelects = $findedUser->studentQuestionnaireResult()->get();

            $is_exist = false;

            if (!is_null($readyProfessionSelects->first())) {
                foreach ($this->getTypes() as $type) {
                    /////вероятность остаться в родном городе
                    @$readyProfessionSelectInterval = $control_values_anketsItems[$type]["profession_ready"];


                    if (!is_null($readyProfessionSelectInterval)) {
                        if (!empty($readyProfessionSelectInterval)) {


                            $readyProfessionSelectResult = $readyProfessionSelects->first()->willingness_to_choose_profession_score;

                            $readyProfessionSelectResult_title = $readyProfessionSelects->first()->willingness_to_choose_profession_label;

                            if ($this->inInterval($readyProfessionSelectInterval, $readyProfessionSelectResult)) {

                                @$result['total_score'][$type] = @$result['total_score'][$type] * 1 + 1;
//                                @$result["ready_profession"][$type] = $readyProfessionSelectResult_title . " (" . $readyProfessionSelectResult . ")";
                                @$result["ready_profession"][$type] = $readyProfessionSelectResult;
                                $is_exist = true;
                            }

                        }
                    }

                }


                if ($is_exist == false) {
                    @$readyProfessionSelectResult = $readyProfessionSelects->first()->willingness_to_choose_profession_score;
                    if (!empty($readyProfessionSelectInterval)) {
                        $readyProfessionSelectResult_title = $readyProfessionSelects->first()->willingness_to_choose_profession_label;
//                        @$result["ready_profession"]["black"] = $readyProfessionSelectResult_title . " (" . $readyProfessionSelectResult . ")";
                        @$result["ready_profession"]["black"] = $readyProfessionSelectResult_title;
                    }
                }
            }

            return $result;
        }

    }

    public function getAnketWithProfileResults($question_id, $findedUser, $findedProfile)
    {
        $result = [];
          $question = Question::find($question_id);

        if (!is_null(@$question->userAnswers($findedUser)[0])) {

            $user_answer = $question->userAnswers($findedUser)[0]->answer()->latest()->first();

            $control_values_ankets = $this->getAnketQuestions($findedProfile);

            if (!empty($user_answer)) {
                $is_exist = false;

                if (!empty($control_values_ankets)) {
                    foreach ($this->getTypes() as $type) {

                        if ($this->inInterval($control_values_ankets[$type], $user_answer->id)) {
                            @$result[$type] = $user_answer->title;
                            $is_exist = true;
                        }
                    }
                }

                if ($is_exist == false) {
                    @$result["black"] = $user_answer->title;
                }
            }

        }

        return $result;
    }

}
