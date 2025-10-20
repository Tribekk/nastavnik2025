<?php

namespace Domain\UserProfile\Controllers;


use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\IntelligenceLevel;
use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\Quiz\Models\Situation;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\UserProfile\Actions\UserProfiler;
use Domain\UserProfile\Models\UserProfile;
use Domain\UserProfile\Models\AnketItems;
use Domain\UserProfile\Models\AnketResults;
use Domain\UserProfile\Models\BaseTestItems;
use Domain\UserProfile\Models\BaseTestResults;
use Domain\UserProfile\Models\ConsultResults;
use Domain\UserProfile\Models\DeepTestItems;
use Domain\UserProfile\Models\DeepTestResults;
use Domain\UserProfile\Requests\UserProfileBasicRequest;
use Domain\Repositories\UserProfileRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Exports\UserProfileExport;

class UserProfileController extends Controller
{
    private $userProfileRepository;

    public function __construct()
    {
        $this->userProfileRepository=app(UserProfileRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userProfiles=$this->userProfileRepository->getAllWithPaginate();
        return view('admin.user_profiles.index',compact( 'userProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //страница создания профиля пользователя

       /* $anketItem=new AnketItems();
        $anketItem->user_profile_id=1;
        $anketItem->quiz_id=3;
        $anketItem->question_id=52;
        $anketItem->uuid="dfdsfd";
        $anketItem->save();
*/
        //dd($this->userProfileRepository->getEdit(1)->anketItems()->first()->question_id);
        return view('admin.user_profiles.add');
    }


    public function createByExists()
    {

        //получаем все существующие профили

       $user_profiles=$this->userProfileRepository->getForComboBox();


        return view('admin.user_profiles.add_by_exists',compact('user_profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfileBasicRequest $request)
    {
        $data=$request->input();
        $data["is_completed"]=0;
        $data["uuid"]="fdsfds";

        $item=(new UserProfile())->create($data);


            $new_item=new AnketItems();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values='';
            $new_item->quiz_id=14;
            $new_item->uuid="fdsfdfds";
            $new_item->save();



            $new_item=new BaseTestItems();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values="";
            $new_item->quiz_id=13;
            $new_item->uuid="";
            $new_item->save();





            $new_item=new DeepTestItems();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values="";
            $new_item->quiz_id=3;
            $new_item->uuid="fgfdgdffd";
            $new_item->save();




            $new_item=new AnketResults();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values="";
            $new_item->quiz_id=14;
            $new_item->uuid="fdfds";
            $new_item->save();



            $new_item=new DeepTestResults();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values="";
            $new_item->quiz_id=3;
            $new_item->uuid="dfffdfdfds";
            $new_item->save();



            $new_item=new ConsultResults();

            $new_item->user_profile_id=$item->id;
            $new_item->control_values="";
            $new_item->quiz_id=14;
            $new_item->uuid="fdfdsfs";
            $new_item->save();




        if($item) {

            return redirect()->route('user_profiles.index')->with(['success'=>'Профиль успешно добавлен']);
        } else {
            return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
        }
    }


    public function storeByExists(Request $request)
    {
        $data=$request->input();
        $data["is_completed"]=0;
        $data["uuid"]="fdsfds";
        $profile_createed=(new UserProfile())->create($data);

        //получаем все данные профиля указанного
        $profile_exists=UserProfile::find($data["profile_exists_id"]);

        $anketItems=$profile_exists->anketItems();
        foreach($anketItems->get() as $item) {

            $new_item=new AnketItems();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }


        $baseTestItems=$profile_exists->baseTestItems();
        foreach($baseTestItems->get() as $item) {

            $new_item=new BaseTestItems();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }


        $deepTestItems=$profile_exists->deepTestItems();
        foreach($deepTestItems->get() as $item) {

            $new_item=new DeepTestItems();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }


        $anketResults=$profile_exists->anketResults();
        foreach($anketResults->get() as $item) {

            $new_item=new AnketResults();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }

        $deepTestResults=$profile_exists->deepTestResults();
        foreach($deepTestResults->get() as $item) {

            $new_item=new DeepTestResults();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }


        $consult_results=$profile_exists->consultResults();
        foreach($consult_results->get() as $item) {

            $new_item=new ConsultResults();

            $new_item->user_profile_id=$profile_createed->id;
            $new_item->control_values=$item->control_values;
            $new_item->quiz_id=$item->quiz_id;
            $new_item->uuid=$item->uuid;
            $new_item->save();
        }



        if($profile_exists) {

            return redirect()->route('user_profiles.index')->with(['success'=>'Профиль успешно добавлен']);
        } else {
            return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    ///////////load to excel files

    public function excelCreating($id)
    {

      //return Excel::download(new UsersExport, 'users.xlsx');)

        return Excel::download(new UserProfileExport($id), 'user_profiles.xlsx');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userProfile=$this->userProfileRepository->getEdit($id);


        $anket_items_completeted=false;
        $base_items_completeted=false;
        $deep_test_items_completeted=false;
        $anket_results_completeted=false;
        $deep_results_completeted=false;
        $consult_completeted=false;

        /////////////////////////////////
        ////////////////готовность анкеты
        $anketItems=$userProfile->anketItems()->get();

        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }

        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }

        $quiz_count=$anketItems->first()->quiz()->first()->questions()->count();


        if($max_count==$quiz_count) {
            $anket_items_completeted=true;
        }

        /////////////////////////////////
        ////////////////готовность базового теста
        $anketItems=$userProfile->baseTestItems()->get();
        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }

        $quiz_count=$anketItems->first()->quiz()->first()->questions()->count();


        if($max_count==$quiz_count) {
            $base_items_completeted=true;
        }


        /////////////////////////////////
        ////////////////готовность глубинного теста
        $anketItems=$userProfile->deepTestItems()->get();
        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }

        $quiz_count=$anketItems->first()->quiz()->first()->questions()->count();


        if($max_count==$quiz_count) {
            $deep_test_items_completeted=true;
        }

        /////////////////////////////////
        ////////////////готовность отбора по анкете
        $anketItems=$userProfile->anketResults()->get();
        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }

        $quiz_count=$anketItems->first()->quiz()->first()->questions()->count();


        if($max_count>=$quiz_count) {
            $anket_results_completeted=true;
        }


        /////////////////////////////////
        ////////////////готовность отбора по углубленному тесту
        $anketItems=$userProfile->deepTestResults()->get();
        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }

        $quiz_count=$anketItems->first()->quiz()->first()->questions()->count();


        if($max_count>=$quiz_count) {
            $deep_results_completeted=true;
        }


/////////////////////////////////
        ////////////////готовность отбора по консультациям
        $anketItems=$userProfile->consultResults()->get();
        $control_values= $anketItems->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $max_count=0;
        foreach($control_values as $ctrl_value) {
            if(count($ctrl_value)>$max_count) {
                $max_count=count($ctrl_value);
            }
        }



        if($max_count>=3) {
            $consult_completeted=true;
        }



        if(empty($userProfile)) {
            abort(404);
        } else {
            return view('admin.user_profiles.edit', compact(
                "userProfile",
                'anket_items_completeted',
                'base_items_completeted',
                'deep_test_items_completeted',
                'anket_results_completeted',
                'deep_results_completeted',
                'consult_completeted',
            ));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileBasicRequest $request, $id)
    {
        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $data=$request->all();
        $result=$userProfile->update($data);

        if($result) {
            return redirect()->route('user_profiles.edit',$userProfile->id)->with(['success'=>'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=UserProfile::destroy($id);
        if($result) {
            return redirect()->route('user_profiles.index')->with(['success'=>'Запись успешно удалена']);
        } else {
            return back()->withErrors(['msg'=>'Запись не удалена!']);
        }
    }

    public function ankets($id)
    {
        $userProfile = $this->userProfileRepository->getEdit($id);

        if (empty($userProfile)) {
            return back()->withErrors(['msg' => 'Такой профиль не найден']);
        }

        $anketItems = $userProfile->anketItems()->get();

        $questions = $anketItems->first()->quiz()->first()->questions()->get();
        $control_values = $anketItems->first()->control_values;

        if (empty($control_values)) {
            $control_values = array();
        } else {
            $control_values = unserialize($control_values);
        }
//dd($questions[0]->answers()->get()[0]->title);
        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.anket_items', compact('userProfile', 'anketItems', 'questions', 'control_values'));

    }

    public function ankets_update(Request $request, $id) {
        $data=$request->all();
        $anketItems=$data["anketItems"];
        $control_values=serialize( $anketItems);

        $anketItem=AnketItems::find($id);
        if(empty($anketItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $anketItem->control_values=$control_values;
            $anketItem->update();
            return back()->with(['success'=>'Критерии отбора по анкете успешно сохранены!']);
        }


    }


    public function baseTestItems($id) {
        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $PersonalTypeOfThinkingModelItems = TypeOfThinking::where('quiz_id', 13)->get();
        $ProfessionalTypeOfThinkingModelItems = TypeOfThinking::where('quiz_id', 3)->get();

        $baseTestItems=$userProfile->baseTestItems()->get();
        $questions=$baseTestItems->first()->quiz()->first()->questions()->get();
        $control_values= $baseTestItems->first()->control_values;

        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }

//        dd($userProfile,$baseTestItems,$questions);


        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.base_test_items',compact('userProfile', 'ProfessionalTypeOfThinkingModelItems','PersonalTypeOfThinkingModelItems', 'baseTestItems','questions','control_values'));


    }


    public function baseTestUpdate(Request $request, $id) {
        $data=$request->all();
        $baseTestItems=$data["baseTestItems"];

        $control_values=serialize( $baseTestItems);


        $baseTestItem=BaseTestItems::find($id);
        if(empty($baseTestItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $baseTestItem->control_values=$control_values;
            $baseTestItem->update();
            return back()->with(['success'=>'Критерии по модели компетенций наставника успешно сохранены!']);
        }


    }



    public function deepTestItems($id) {
        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $deepTestItems=$userProfile->deepTestItems()->get();
        $questions=$deepTestItems->first()->quiz()->first()->questions()->get();
        $control_values= $deepTestItems->first()->control_values;

        $inclinations=Inclination::all();

        $types_of_thinking=TypeOfThinking::all();

        $intellegens_levels=IntelligenceLevel::all();

        $intellegens_levels_types=IntelligenceLevelType::all();

        $situations=Situation::all();


        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }

        ////dd($userProfile,$baseTestItems,$questions);


        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.deep_test_items',
            compact('userProfile',
                'deepTestItems',
                'questions',
                'control_values',
                'inclinations',
                'types_of_thinking',
                'intellegens_levels',
                'intellegens_levels_types',
                'situations'));


    }


    public function deepTestUpdate(Request $request, $id) {
        $data=$request->all();
        $deepTestItems=$data["deepTestItems"];

        $control_values=serialize( $deepTestItems);


        $deepTestItem=DeepTestItems::find($id);
        if(empty($deepTestItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $deepTestItem->control_values=$control_values;
            $deepTestItem->update();
            return back()->with(['success'=>'Критерии отбора по углубленному тесту успешно сохранены!']);
        }


    }


    public function anketResults($id) {

        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $anketResults=$userProfile->anketResults()->get();
        $control_values= $anketResults->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }

       //dd($userProfile,$anketResults,$control_values);


        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.anket_results',compact('userProfile', 'anketResults','control_values'));


    }


    public function anketResultsUpdate(Request $request, $id) {

        $data=$request->all();
        $anketResults=$data["anketResults"];

        $control_values=serialize( $anketResults);


        $anketResultsItem=AnketResults::find($id);
        if(empty($anketResultsItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $anketResultsItem->control_values=$control_values;
            $anketResultsItem->update();
            return back()->with(['success'=>'Критерии отбора по результатам анкеты и базового теста успешно сохранены!']);
        }


    }



    public function deepTestResults($id) {
        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $deepTestResults=$userProfile->deepTestResults()->get();
        $control_values= $deepTestResults->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }


        $inclinations=Inclination::all();

        $types_of_thinking=TypeOfThinking::all();

        $intellegens_levels=IntelligenceLevel::all();

        $intellegens_levels_types=IntelligenceLevelType::all();

        // dd($userProfile,$anketResults,$control_values);


        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.deep_test_results',
            compact('userProfile',
                'deepTestResults',
                'control_values',
                'inclinations',
                'types_of_thinking',
                'intellegens_levels',
                'intellegens_levels_types',

            ));


    }


    public function deepTestResultsUpdate(Request $request, $id) {
        $data=$request->all();
        $deepTestResults=$data["deepTestResults"];

        $control_values=serialize( $deepTestResults);


        $deepTestResultsItem=DeepTestResults::find($id);
        if(empty($deepTestResultsItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $deepTestResultsItem->control_values=$control_values;
            $deepTestResultsItem->update();
            return back()->with(['success'=>'Критерии отбора по результатам углубленного теста успешно сохранены!']);
        }


    }



    public function consultResults($id) {
        $userProfile=$this->userProfileRepository->getEdit($id);
        if(empty($userProfile)) {
            return back()->withErrors(['msg'=>'Такой профиль не найден']);
        }

        $consultResults=$userProfile->consultResults()->get();
        $control_values= $consultResults->first()->control_values;
        if(empty( $control_values)) {
            $control_values=array();
        } else {
            $control_values=unserialize($control_values);
        }



        // dd($userProfile,$anketResults,$control_values);


        ///dd($questions->first()->answers()->get());
        return view('admin.user_profiles.consult_results',compact('userProfile', 'consultResults','control_values'));


    }


    public function consultResultsUpdate(Request $request, $id) {
        $data=$request->all();
        $consultResults=$data["consultResults"];



        $control_values=serialize( $consultResults);



        $consultResultsItem=ConsultResults::find($id);
        if(empty($consultResultsItem)) {
            return back()->withErrors(['msg'=>'Такого элемента профиля не существует!']);
        } else {
            $consultResultsItem->control_values=$control_values;
            $consultResultsItem->update();
            return back()->with(['success'=>'Критерии отбора по результатам консультации успешно сохранены!']);
        }


    }

    public function testUserProfile() {
        $user_id=42;
        $profile_id=18;
        $userProfile=new UserProfiler($user_id,$profile_id);
        $userProfile->run();
    }
}
