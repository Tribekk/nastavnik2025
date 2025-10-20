<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\StoreExternalOrgunitActivityKindRequest;
use App\Admin\Requests\StoreExternalOrgunitRequest;
use App\Admin\Requests\UpdateExternalOrgunitActivityKindRequest;
use App\Admin\Requests\UpdateExternalOrgunitRequest;
use Domain\Admin\Models\School;
use Domain\Orgunit\Actions\CreateActivityKindAction;
use Domain\Orgunit\Actions\CreateExternalOrgunitAction;
use Domain\Orgunit\Actions\DeleteExternalOrgunitLogoAction;
use Domain\Orgunit\Actions\GetActivityKindsAction;
use Domain\Orgunit\Actions\GetOrgunitsAction;
use Domain\Orgunit\Actions\UpdateActivityKindAction;
use Domain\Orgunit\Actions\UpdateExternalOrgunitAction;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\Orgunit\Models\ExternalOrgunitActivityKind;
use Domain\User\Models\User;
use Domain\UserProfile\Models\UserProfile;
use Illuminate\Http\Request;
use Sabberworm\CSS\Value\URL;
use Support\Controller;

class ExternalOrgunitController extends Controller
{
    public function index(Request $request, GetOrgunitsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        return view('admin.orgunits.index')
            ->withOrgunits($action->run($request->q, false, $request->input()));
    }

    public function create()
    {
        return view('admin.orgunits.create');
    }

    public function store(StoreExternalOrgunitRequest $request, CreateExternalOrgunitAction $action)
    {
//        dd($request);

        ////добобработка списка локаций
       $all_data=$request->all();

       $current_location=$all_data["current_location"]*1;
       $current_location=$current_location-1;
       $current_location_str=array();

        $school_id = 0;
        for ($i = 1; $i <= $current_location; $i++) {

            if (isset($all_data["schools_id_" . $i]) && !empty($all_data["schools_id_" . $i]) &&
                isset($all_data["class_id_" . $i]) && key_exists("class_id_" . $i, $all_data) &&
                count($all_data["class_id_" . $i]) > 0) {

                foreach ($all_data["class_id_" . $i] as $class) {
                    $current_location_str[$school_id ] = $all_data["search_location_" . $i];
                    $current_location_str[$school_id]["schools_id"] = $all_data["schools_id_" . $i];
//                        $all_data["search_location_" . $school_id]["schools_id"] = $all_data["schools_id_" . $i];

                    ////добавляем название школы
                    $school = School::find($all_data["schools_id_" . $i]);
                    if ($school) {
                        $current_location_str[$school_id]["school_name"] = $school->short_title;
//                            $all_data["search_location_" . $school_id]["school_name"] = $school->short_title;
                    }
                    $current_location_str[$school_id]["class_id"] = $class;
//                        $all_data["search_location_" . $school_id]["class_id"] = $class;
//                        $current_location_str[] = $all_data["search_location_" . $school_id];
                    $school_id++;

                }
            }
        }

       $all_data["search_location"]=$current_location_str;


        $action->run($all_data,$request);

        return redirect(route('admin.orgunits.view'))
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



        if(!empty($orgunit->profile_name)) {
            $orgunit->profile_name=unserialize($orgunit->profile_name);
        } else {
            $orgunit->profile_name=array('');
        }

        if(!empty($orgunit->profile_target)) {
            $orgunit->profile_target=unserialize($orgunit->profile_target);
        } else {
            $orgunit->profile_target=array('');
        }

        $url = \Illuminate\Support\Facades\URL::to("/");


        return view('admin.orgunits.edit',compact('orgunit','url'));
    }

    public function update(UpdateExternalOrgunitRequest $request, ExternalOrgunit $orgunit, UpdateExternalOrgunitAction $action)
    {
        ////добобработка списка локаций
        $all_data = $request->all();

        ////получаем старые значения
        if (!empty($orgunit->personal_quiz)) {
            $orgunit->personal_quiz = unserialize($orgunit->personal_quiz);
        } else {
            $orgunit->personal_quiz = array('');
        }

        ////получаем старые значения
        if (!empty($orgunit->search_location)) {
            $orgunit->search_location = unserialize($orgunit->search_location);
        } else {
            $orgunit->search_location = array('');
        }


        if (isset($all_data["schools_id_1"]) and isset($all_data["class_id_1"])) {

            // dd($all_data);

            $current_location = $all_data["current_location"] * 1;

            $current_location = $current_location - 1;
            $current_location_str = array();
            $school_id = 0;
            for ($i = 1; $i <= $current_location; $i++) {

                if (isset($all_data["schools_id_" . $i]) && !empty($all_data["schools_id_" . $i]) &&
                    isset($all_data["class_id_" . $i]) && key_exists("class_id_" . $i, $all_data) &&
                    count($all_data["class_id_" . $i]) > 0) {

                    foreach ($all_data["class_id_" . $i] as $class) {
                        $current_location_str[$school_id ] = $all_data["search_location_" . $i];
                        $current_location_str[$school_id]["schools_id"] = $all_data["schools_id_" . $i];
//                        $all_data["search_location_" . $school_id]["schools_id"] = $all_data["schools_id_" . $i];

                        ////добавляем название школы
                        $school = School::find($all_data["schools_id_" . $i]);
                        if ($school) {
                            $current_location_str[$school_id]["school_name"] = $school->short_title;
//                            $all_data["search_location_" . $school_id]["school_name"] = $school->short_title;
                        }
                        $current_location_str[$school_id]["class_id"] = $class;
//                        $all_data["search_location_" . $school_id]["class_id"] = $class;
//                        $current_location_str[] = $all_data["search_location_" . $school_id];
                        $school_id++;

                    }
                }
            }

            $all_data["search_location"] = $current_location_str;
            //$request->all()["search_location"]=$current_location_str;
            //dd($all_data, $all_data["search_location"]);
        } else {
            $all_data["search_location"] = $orgunit->search_location;
        }

        //  dd($all_data["profile_target"],$all_data["profile_name"]);

        ////обновление персонального квиза

        $personal_quiz["quiz_question_text"] = $all_data["quiz_question_text"];
        $personal_quiz["type_quiz_question"] = $all_data["type_quiz_question"];
        $personal_quiz["quiz_variants"] = $all_data["quiz_variants"];
        $personal_quiz["quiz_answers"] = $all_data["quiz_answers"];
        $personal_quiz["video_link"] = $all_data["video_link"];
        $personal_quiz["quiz_title"] = $all_data["quiz_title"];
        $personal_quiz["quiz_description"] = $all_data["quiz_description"];


        ///обработка файла буклета
        if (isset($all_data["answer_bucklet"])) {

            $destinationPath = 'uploads';
            $fileName = md5(time()) . "_" . $all_data["answer_bucklet"]->getClientOriginalName();
            $all_data["answer_bucklet"]->move($destinationPath, $fileName);
            $url = '/uploads/' . $fileName;
            $personal_quiz["answer_bucklet"] = $url;

        } else {

            if (!empty($orgunit->personal_quiz["answer_bucklet"])) {
                $personal_quiz["answer_bucklet"] = $orgunit->personal_quiz["answer_bucklet"];
            } else {
                $personal_quiz["answer_bucklet"] = '';
            }


        }


        ///обработка всех файлов и сохранение их по урл
        if (isset($all_data["photo"])) {
            foreach ($all_data["photo"] as $pos => $photo) {
                $destinationPath = 'uploads';
                $fileName = md5(time()) . "_" . $photo->getClientOriginalName();
                $photo->move($destinationPath, $fileName);
                $url = '/uploads/' . $fileName;
                $personal_quiz["photo_link"][$pos] = $url;

            }
        } else {
            ////получаем уже сохраненные картинки

            if (!empty($orgunit->personal_quiz["photo_link"])) {
                $personal_quiz["photo_link"] = $orgunit->personal_quiz["photo_link"];

                ///какие фото надо убрать
                foreach ($personal_quiz["photo_link"] as $pos_photo => $photo) {
                    if (isset($all_data["hide_photo"][$pos_photo])) {
                        unset($personal_quiz["photo_link"][$pos_photo]);
                    }
                }
            }

        }

        $all_data["personal_quiz"] = $personal_quiz;


        $action->run($orgunit, $all_data);

        return redirect(route('admin.orgunits.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(ExternalOrgunit $orgunit)
    {
        if($orgunit->hasRelations) {
            return redirect(route('admin.orgunits.edit', ['orgunit' => $orgunit]))
                ->withErrors(['destroy' => __('У данной организации есть связь с организацией или пользователем')]);
        }

        $orgunit->delete();

        return redirect(route('admin.orgunits.view'))
            ->with('status', 'Организация удалена');
    }

    public function logoDestroy(ExternalOrgunit $orgunit, DeleteExternalOrgunitLogoAction $action)
    {
        $action->run($orgunit);
        return response('Логотип организации успешно удален!', 201);
    }

    public function show(ExternalOrgunit $orgunit)
    {
        return $orgunit;
    }


}
