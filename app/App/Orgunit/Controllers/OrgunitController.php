<?php

namespace App\Orgunit\Controllers;

use App\Admin\Requests\StoreExternalOrgunitRequest;
use App\Admin\Requests\UpdateExternalOrgunitRequest;
use App\Kladr\Controllers\KladrController;
use App\Orgunit\Requests\UpdateExternalOrgunitDescriptionRequest;
use Domain\Orgunit\Actions\CreateExternalOrgunitAction;
use Domain\Orgunit\Actions\DeleteExternalOrgunitLogoAction;
use Domain\Orgunit\Actions\GetChildrenOrgunitsAction;
use Domain\Orgunit\Actions\GetOrgunitsAction;
use Domain\Orgunit\Actions\UpdateExternalOrgunitAction;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\Orgunit\Models\OrgunitNote;
use Domain\Orgunit\Models\PersonalQuizBall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Support\Controller;

class OrgunitController extends Controller
{
    public function index(Request $request, GetOrgunitsAction $action, GetChildrenOrgunitsAction $getChildrenOrgunitsAction)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        if(!Auth::user()->isEmployer) abort(403);
        if(Auth::user()->orgunit) {
            return view('orgunits.index')
                ->withOrgunits($getChildrenOrgunitsAction->run(Auth::user()->orgunit, $request->q, false, $request->all()));
        }

        return view('orgunits.errors.undefined_orgunit');
    }

    public function children(Request $request, ExternalOrgunit $orgunit, GetChildrenOrgunitsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($orgunit, $request->q, true);
        }

        abort(403);
    }

    public function show(ExternalOrgunit $orgunit)
    {
        return $orgunit;
    }

    public function childCreate(ExternalOrgunit $orgunit)
    {
        return view('orgunits.child_create')
            ->withParentId($orgunit->id);
    }


    public function store(StoreExternalOrgunitRequest $request, CreateExternalOrgunitAction $action)
    {

        $action->run($request->all());

        return redirect(route('orgunits.view'))
            ->with('status', 'Организация добавлена');
    }

    public function edit(ExternalOrgunit $orgunit)
    {


        if (!empty($orgunit->search_location)) {
            $unserialize_search_locations = unserialize($orgunit->search_location);
            $sorted_locations = [];
            foreach ($unserialize_search_locations as $location) {
                if (array_key_exists($location['schools_id'], $sorted_locations)) {
                    $sorted_locations[$location['schools_id']]['class_id'][] = $location['class_id'];
                } else {
                    $sorted_locations[$location['schools_id']] = $location;
                    $sorted_locations[$location['schools_id']]['class_id'] = [];
                    $sorted_locations[$location['schools_id']]['class_id'][] = $location['class_id'];
                }
            }
            $orgunit->search_location = $sorted_locations;

        } else {
            $orgunit->search_location = array('');
        }


        if(!empty($orgunit->personal_quiz)) {
            $orgunit->personal_quiz=unserialize($orgunit->personal_quiz);
        } else {
            $orgunit->personal_quiz=array('');
        }


        $url = URL::to("/");


        return view('orgunits.edit',compact('orgunit','url'));
    }

    public function update(UpdateExternalOrgunitRequest $request, ExternalOrgunit $orgunit, UpdateExternalOrgunitAction $action)
    {



        $all_data=$request->all();

        ////получаем старые значения
        if(!empty($orgunit->personal_quiz)) {
            $orgunit->personal_quiz=unserialize($orgunit->personal_quiz);
        } else {
            $orgunit->personal_quiz=array('');
        }


        ////обновление персонального квиза


        $personal_quiz["quiz_question_text"]=$all_data["quiz_question_text"];
        $personal_quiz["type_quiz_question"]=$all_data["type_quiz_question"];
        $personal_quiz["quiz_variants"]=$all_data["quiz_variants"];
        $personal_quiz["quiz_answers"]=$all_data["quiz_answers"];
        $personal_quiz["video_link"]=$all_data["video_link"];
        $personal_quiz["quiz_title"]=$all_data["quiz_title"];
        $personal_quiz["quiz_description"]=$all_data["quiz_description"];


        ///обработка файла буклета
        if(isset($all_data["answer_bucklet"])) {

            $destinationPath = 'uploads';
            $fileName = md5(time()) . "_" . $all_data["answer_bucklet"]->getClientOriginalName();
            $all_data["answer_bucklet"]->move($destinationPath, $fileName);
            $url = '/uploads/' . $fileName;
            $personal_quiz["answer_bucklet"] = $url;

        } else {


            $personal_quiz["answer_bucklet"]=$orgunit->personal_quiz["answer_bucklet"];

        }


        ///обработка всех файлов и сохранение их по урл
        if(isset($all_data["photo"])) {
            foreach ($all_data["photo"] as $pos => $photo) {
                $destinationPath = 'uploads';
                $fileName = md5(time()) . "_" . $photo->getClientOriginalName();
                $photo->move($destinationPath, $fileName);
                $url = '/uploads/' . $fileName;
                $personal_quiz["photo_link"][$pos] = $url;

            }
        } else {
            ////получаем уже сохраненные картинки

            $personal_quiz["photo_link"]=$orgunit->personal_quiz["photo_link"];

            ///какие фото надо убрать
            foreach($personal_quiz["photo_link"] as $pos_photo=>$photo) {
                if(isset($all_data["hide_photo"][$pos_photo])) {
                    unset($personal_quiz["photo_link"][$pos_photo]);
                }
            }

        }

        $all_data["personal_quiz"]=$personal_quiz;

        $block_edit_locations=true;

        $action->run($orgunit, $request->all(), $all_data, $block_edit_locations);

        return redirect(route('orgunits.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(ExternalOrgunit $orgunit)
    {
        if($orgunit->hasRelations) {
            return redirect(route('orgunits.edit', ['orgunit' => $orgunit]))
                ->withErrors(['destroy' => __('У данной организации есть связь с организацией или пользователем')]);
        }

        $orgunit->delete();

        return redirect(route('orgunits.view'))
            ->with('status', 'Организация удалена');
    }

    public function logoDestroy(ExternalOrgunit $orgunit, DeleteExternalOrgunitLogoAction $action)
    {
        $action->run($orgunit);
        return response('Логотип организации успешно удален!', 201);
    }

    public function description(ExternalOrgunit $orgunit)
    {
        return view('orgunits.description')
            ->withOrgunit($orgunit);
    }

    public function editDescription(ExternalOrgunit $orgunit)
    {
        return view('orgunits.edit_description')
            ->withOrgunit($orgunit);
    }

    public function updateDescription(UpdateExternalOrgunitDescriptionRequest $request, ExternalOrgunit $orgunit)
    {
        $orgunit->update([
            'career_program' => $request->input('career_program'),
            'about_orgunit' => $request->input('about_orgunit'),
            'contacts' => $request->input('contacts')
        ]);

        return redirect(route('orgunits.description.edit', $orgunit))
            ->with('status', 'Данные обновлены');
    }



    public function personal_quiz(ExternalOrgunit $orgunit) {
        if(!empty($orgunit->personal_quiz)) {
            $orgunit->personal_quiz=unserialize($orgunit->personal_quiz);
        } else {
            $orgunit->personal_quiz=array('');
        }



        return view('orgunits.personal_quiz',compact('orgunit'));
    }

    public function personal_quiz_send(Request $request, ExternalOrgunit $orgunit)
    {
//dd($request);
        /*
        $PersonalQuizBall=new PersonalQuizBall();
        $PersonalQuizBall->user_id=Auth::user()->id;
        $PersonalQuizBall->orgunit_id=$orgunit->id;
        $PersonalQuizBall->ball=9;
        $PersonalQuizBall->save();
        */

        $PersonalQuizBall = PersonalQuizBall::where('user_id', Auth::user()->id)->first();
        if (!$PersonalQuizBall) {
            $PersonalQuizBall = new PersonalQuizBall();
            $PersonalQuizBall->user_id = Auth::user()->id;
            $PersonalQuizBall->orgunit_id = $orgunit->id;
            $PersonalQuizBall->ball = 0;
            $PersonalQuizBall->save();
        }


        ///подсчет правильности ответов
        if (!empty($orgunit->personal_quiz)) {
            $orgunit->personal_quiz = unserialize($orgunit->personal_quiz);
        } else {
            $orgunit->personal_quiz = array('');
        }

        $quiz_answers = $orgunit->personal_quiz["quiz_answers"];

//        $user_answers = $request->all()["answer"];

        if ($request->get("answer") && !empty($request->get("answer"))){
            $user_answers = $request->get("answer");
        }elseif ($PersonalQuizBall->answers && !empty($PersonalQuizBall->answers) && is_string($PersonalQuizBall->answers)){
            $user_answers = unserialize($PersonalQuizBall->answers);
        }else{
            $user_answers = [];
        }

        $result_ball = 0;
        $total_questions = 0;
        $questions_correct_answers = [];

        foreach ($quiz_answers as $pos => $quiz_answer) {
            if ($quiz_answer != null && !empty($user_answers)) {
                ////получаем варианты ответа
                $answer_variants = explode("\r\n", $quiz_answer);

                if (key_exists($pos, $user_answers)) {

                    $user_answer = $user_answers[$pos];
                    if (!is_array($user_answer)) $user_answer = [$user_answer];

                    if ($user_answer && empty(array_diff($user_answer, $answer_variants))) {
                        $questions_correct_answers[$pos] = $user_answer;
                        $result_ball = $result_ball + 1;
                    }
                }

                $total_questions++;
            }
        }

        $legal_address = $orgunit->legal_address->region;
        $kladr_controller = new KladrController();

        $orgunit->legal_region_string = $kladr_controller->region($orgunit->legal_address->region)->title;
        $orgunit->legal_city_string = $kladr_controller->city($orgunit->legal_address->city)->title;
        $orgunit->legal_street_string = $kladr_controller->street($orgunit->legal_address->street)->title;
        $orgunit->legal_house_string = $orgunit->legal_address->house;

        $orgunit->fact_region_string = $kladr_controller->region($orgunit->fact_address->region)->title;
        $orgunit->fact_city_string = $kladr_controller->city($orgunit->fact_address->city)->title;
        $orgunit->fact_street_string = $kladr_controller->street($orgunit->fact_address->street)->title;
        $orgunit->fact_house_string = $orgunit->fact_address->house;

        if ($total_questions <= 0) {
            $result = 0;
        } else {
            $result = round($result_ball / $total_questions * 100);
        }

        $PersonalQuizBall->ball = $result;

        if ($request->get("answer") && is_array($request->get("answer")) && !empty($request->get("answer"))){
            $PersonalQuizBall->answers = serialize($request->get("answer"));
        }

        $PersonalQuizBall->update();
//          dd(__METHOD__,$orgunit->personal_quiz, $request, Auth::user()->getPersonalQuizBall(),$PersonalQuizBall);

        return view('orgunits.personal_quiz_result', compact('orgunit', 'quiz_answers', 'result', 'questions_correct_answers'));


    }

    public function settings() {
        return view('orgunits.settings');
    }

    public function partnersPage(ExternalOrgunit $orgunit) {


        return view('orgunits.personal_page')->withOrgunit($orgunit);
    }


    public function save_personal_notes(Request $request) {

        $all_data=$request->all();
        $user_id=$all_data["user_id"];
        $note=$all_data["note"];
        $type=$all_data["type"];

        $orgunitNote = OrgunitNote::where('orgunit_id', Auth::user()->id)->where('user_id',$user_id)->where('type',$type)->first();
        if(!$orgunitNote) {
            $orgunitNote=new OrgunitNote();
            $orgunitNote->user_id=$user_id;
            $orgunitNote->orgunit_id=Auth::user()->id;
            $orgunitNote->note=$note;
            $orgunitNote->type=$type;
            $orgunitNote->save();
        } else {
            $orgunitNote->note=$note;
            $orgunitNote->update();
        }


    }


}
