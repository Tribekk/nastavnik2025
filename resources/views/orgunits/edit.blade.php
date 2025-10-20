@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление организацией"/>
@endsection

@section ('content')



    <div class="container">

        <div class="card card-custom">

            <div class="card-header card-header-tabs-line nav-tabs-line-3x">


                <div class="card-toolbar">


                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">

                    </div>
                    <div class="card-toolbar">

                    </div>
                    <br>



                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">


                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#common-tab">

                                <span class="nav-text font-size-lg">{{ __('Общая информация') }}</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#location-tab">

                                <span class="nav-text font-size-lg">{{ __('Область поиска наставников') }}</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#profiles-tab">

                                <span class="nav-text font-size-lg">{{ __('Профили') }}</span>
                            </a>
                        </li>


                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#quiz-tab">

                                <span class="nav-text font-size-lg">{{ __('Квиз организации') }}</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link mx-0" data-toggle="tab" href="#landing-tab">

                                <span class="nav-text font-size-lg">{{ __('Выбор лендинга') }}</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="tab-content">

                    <div class="tab-pane show px-7 active" id="common-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">


                                <form action="{{ route('orgunits.update', $orgunit) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PATCH')

                                    @error('destroy')
                                    <x-alert type="danger" text="{{$message}}"/>
                                    @enderror


                                    <x-inputs.image id="logo" name="logo" placeholder="{{ $orgunit->logoUrl }}" destroyAction="{{ $orgunit->logo ? route('admin.orgunits.logo.destroy', $orgunit) : null }}" title="Логотип"/>

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название" value="{{ old('title', $orgunit->title) }}"/>
                                    {{ $orgunit->title }}

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название" value="{{ old('title', $orgunit->short_title) }}"/>

                                    <x-inputs.select2 id="legal_form_id" name="legal_form_id"
                                                      required
                                                      url="{{ route('admin.orgunits.legal_forms.view') }}"
                                                      selectedUrl="/orgunits/legal_forms"
                                                      value="{{ old('legal_form_id', $orgunit->legal_form_id) ?? '' }}"
                                                      title="Организационно-правовая форма"
                                                      placeholder="Выбор организационно-правовой формы"/>

                                    <x-inputs.address id="legal_address"
                                                      name="legal_address"
                                                      region="{{ optional($orgunit->legal_address)->region }}"
                                                      city="{{ optional($orgunit->legal_address)->city }}"
                                                      street="{{ optional($orgunit->legal_address)->street }}"
                                                      house="{{ optional($orgunit->legal_address)->house }}"
                                                      title="Юридический адрес"/>

                                    <x-inputs.address id="fact_address"
                                                      name="fact_address"
                                                      region="{{ optional($orgunit->fact_address)->region }}"
                                                      city="{{ optional($orgunit->fact_address)->city }}"
                                                      street="{{ optional($orgunit->fact_address)->street }}"
                                                      house="{{ optional($orgunit->fact_address)->house }}"
                                                      title="Фактический адрес"/>


                                    <input type="text" name="parent_id" id="parent_id" value="{{ old('parent_id', request('parent_id')) }}" hidden>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="location-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                @php


                                    if(isset($orgunit->search_location)) {

                                        $current_location=count($orgunit->search_location)+1;
                                    } else {
                                        $current_location=0;
                                    }
                                @endphp

                                <script>
                                    search_location=1;

                                    setInterval(function() {
                                        for(i=1;i<={{ $current_location }};i++) {
                                            document.getElementById('div-search_location_' + i + '-street').style.display = "none";
                                            document.getElementById('div-search_location_'+i+'-house').style.display = "none";
                                        }
                                    },1000);
                                </script>



                                <script>

                                    var current_location={{ $current_location }};

                                    var loaded= new Map([]);
                                    var global_selected_id=0;


                                    function get_schools(id,selected_id=0) {
                                        var get_city=document.getElementById('search_location_'+id+'-city').value;

                                        ///отправляем запрос аяксом
                                        $.ajax({
                                            url: '/kladr/schools/' + get_city,
                                            type: "GET" ,
                                            dataType: 'json'
                                        }).done(function(result)  {

                                            ///проверить


                                            var check_str="";
                                            result.forEach(function (item) {
                                                check_str=check_str+item.title;
                                            });


                                            if(loaded.get('schools_id_'+id)!=check_str) {
                                                document.getElementById('school_value_' + id).value = "";
                                                var selectElement = document.getElementById('schools_id_' + id);
                                                selectElement.innerHTML = "";
                                                loaded.set('schools_id_' + id, check_str);

                                                //alert(result);
                                                result.forEach(function (item) {

                                                    if (document.getElementById('school_value_' + id).value === "") {
                                                        document.getElementById('school_value_' + id).value = item.title;
                                                    }

                                                    var option = document.createElement('option');
                                                    option.value = item.id;

                                                    if (item.id === Number(selected_id)) {
                                                        option.selected = true;
                                                    }

                                                    option.text = item.title;
                                                    selectElement.add(option);

                                                });
                                                $('#schools_id_' + id).trigger('change');
                                            }
                                        });

                                    }


                                    function get_classes(id, class_id=[]) {
                                        var school=document.getElementById('schools_id_'+id).value;
                                        if(school !== "") {

                                            ///отправляем запрос аяксом
                                            $.ajax({
                                                url: '/kladr/classes/' + school,
                                                type: "GET",
                                                dataType: 'json'
                                            }).done(function (result) {

                                                ///проверить
                                                var check_str = "";
                                                result.forEach(function (item) {
                                                    check_str = check_str + item.number;
                                                });


                                                var selectElement = document.getElementById('class_id_' + id);
                                                selectElement.innerHTML = "";
                                                loaded.set('class_id_' + id, check_str);
                                                let values_classes_select2 = [];
                                                console.log('Классы');
                                                let year;
                                                let class_name;
                                                result.forEach(function (item) {

                                                    var option = document.createElement('option');
                                                    year = item.year === null ? '' : "(" + item.year + ")"
                                                    class_name = item.number + item.letter + year;
                                                    option.value = item.id;

                                                    current_class_in_classes = class_id.indexOf((item.id).toString());
                                                    if (current_class_in_classes >= 0) {
                                                        option.selected = true;
                                                        values_classes_select2.push(item.id);
                                                    }

                                                    option.text = class_name;
                                                    selectElement.add(option);

                                                });

                                                $('#class_id_' + id).val(values_classes_select2).text.trigger('change');

                                            });
                                        }
                                    }




                                    function autoren (item) {
                                        console.log ("Favorit " + item.id+" "+item.text)
                                    }

                                    function addLocation() {

                                        if(current_location == 0) {
                                            document.getElementById('main_div_location_1').style.display="block";

                                        } else {
                                            document.getElementById('main_div_location_'+current_location).style.display="block";
                                        }
                                        current_location=current_location+1;


                                        document.getElementById('current_location').value=current_location;
                                    }


                                    function removeLocation() {

                                        if(current_location>1) {

                                            current_location = current_location - 1;
                                            document.getElementById('main_div_location_' + current_location).style.display = "none";

                                            document.getElementById('current_location').value = current_location;
                                        }
                                    }

                                </script>




                                @php
                                    $count_location=0;
                                @endphp

                                {{--                                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>--}}
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


                                @if(isset($orgunit->search_location))
                                    @foreach($orgunit->search_location as $location_item)
                                        @if(!empty($location_item))
                                            @php
                                                $count_location++;
                                                $location=$location_item["region"];
                                                $city=$location_item["city"];
                                                $schools_id=@$location_item["schools_id"];
                                                $class_id=@$location_item["class_id"];// это не id класса, номер класса и буква класса
                                            @endphp

                                            <div id="main_div_location_{{$count_location}}" style="display:block">
                                                <x-inputs.address
                                                    id="search_location_{{$count_location}}"
                                                    name="search_location_{{$count_location}}"
                                                    title="Область поиска наставников №{{$count_location}}"
                                                    region="{{ $location }}"
                                                    city="{{ $city }}"
                                                    required="true"/>


                                                <table><tr><td>Компания: </td><td width="5"></td><td>
                                                            <select name="schools_id_{{$count_location}}" id="schools_id_{{$count_location}}">

                                                            </select>
                                                        </td></tr></table>


                                                <br>
                                                <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                            <select name="class_id_{{$count_location}}[]" id="class_id_{{$count_location}}" multiple="multiple">

                                                            </select>
                                                            <input type="hidden" name="school_value_{{$count_location}}" id="school_value_{{$count_location}}" value="">
                                                        </td></tr></table><br><br>

                                                <script>
                                                    $(document).ready(function () {
                                                        var init_select{{$count_location}} = true;
                                                        $('#class_id_{{$count_location}}').select2({
                                                            width: '300px',
                                                            placeholder: "Выберите структурное подразделение",
                                                            allowClear: true
                                                        });

                                                        $('#search_location_{{$count_location}}-city').on('change', function () {
                                                            get_schools({{$count_location}}, '{{$schools_id}}');
                                                        });

                                                        $(document).on('change', 'select#schools_id_{{$count_location}}', function () {
                                                            let class_id{{$count_location}};

                                                            if (init_select{{$count_location}}) {
                                                                class_id{{$count_location}} = @php echo json_encode($class_id, JSON_UNESCAPED_UNICODE) @endphp;
                                                                init_select{{$count_location}} = false;
                                                            } else {
                                                                class_id{{$count_location}} = [];
                                                            }
                                                            get_classes({{$count_location}}, class_id{{$count_location}});
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif



                                @for($i=$count_location+1;$i<=$count_location+10;$i++)

                                    <div id="main_div_location_{{$i}}" style="display:none">

                                        <x-inputs.address id="search_location_{{$i}}" city=""  name="search_location_{{$i}}" title="Область поиска наставников №{{$i}}"  required="true"/>

                                        <br>
                                        <table><tr><td>Компания: </td><td width="5"></td><td>
                                                    <select name="schools_id_{{$i}}" data-id="{{$i}}"  id="schools_id_{{$i}}" class="school-search">

                                                    </select>
                                                </td></tr></table>


                                        <br>
                                        <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                    <select name="class_id_{{$i}}[]" id="class_id_{{$i}}" multiple="multiple">
                                                    </select>

                                                    <input type="hidden" name="school_value_{{$i}}" id="school_value_{{$i}}" value="">

                                                </td></tr></table><br><br>

                                        <script>
                                            $(document).ready(function () {

                                                $('#class_id_{{$i}}').select2({
                                                    width: '300px',
                                                    placeholder: "Выберите структурное подразделение",
                                                    allowClear: true
                                                });
                                                $(document).on('change', '#search_location_{{$i}}-city', function() {
                                                    get_schools({{$i}});
                                                });

                                                $(document).on('change', '#schools_id_{{$i}}', function() {
                                                    get_classes({{$i}});
                                                });
                                            });
                                        </script>

                                    </div>
                                @endfor

                                <input type="hidden" name="current_location" id="current_location" value="{{ $current_location }}">
                                <br>
                                <br>
                                <input type="button" onClick="addLocation()" value="Добавить область поиска">
                                <input type="button" onClick="removeLocation()" value="Убрать область поиска">
                                <br>
                                <br>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="profiles-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <h3>Ваши профили:</h3><br>

                                @foreach($orgunit->activityKindIdsArr as $user_profile_id)
                                    @php
                                        $user_profile=\Domain\UserProfile\Models\UserProfile::find($user_profile_id);
                                    @endphp

                                    @if($user_profile)
                                        <div style="border:1px solid orangered;border-radius:3px;padding:5px;width:300px" align="center">{{ $user_profile->title }}</div><br>

                                    @endif

                                 @endforeach

                                <br><br>

                                    <h3>Хотите изменить ваш профиль, удалить ли добавить новый профиль?<br>
                                        Обращайтесь к нам!</h3>

                                <br>

                            </div>
                        </div>
                    </div>



                    @php

                        $quiz_question_text=@$orgunit->personal_quiz["quiz_question_text"];
                        $type_quiz_question=@$orgunit->personal_quiz["type_quiz_question"];
                        $quiz_variants=@$orgunit->personal_quiz["quiz_variants"];
                        $quiz_answers=@$orgunit->personal_quiz["quiz_answers"];
                        $video_link=@$orgunit->personal_quiz["video_link"];
                        $photo_link=@$orgunit->personal_quiz["photo_link"];

                        $quiz_title=@$orgunit->personal_quiz["quiz_title"];
                        $quiz_description=@$orgunit->personal_quiz["quiz_description"];
                        $answer_bucklet=@$orgunit->personal_quiz["answer_bucklet"];


                        if(is_null($quiz_question_text)) {
                             $quiz_question_text=array();
                        }

                        $current_answers=0;
                        ////подсчет активных вопросов
                        foreach($quiz_question_text as $q_text) {
                            if(!is_null($q_text) and $q_text!="") {
                                $current_answers++;
                            }
                        }

                    @endphp


                    <div class="tab-pane show px-7" id="quiz-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <script>
                                    var current_answers={{$current_answers}};

                                    function addQuestion() {

                                        current_answers=current_answers+1;
                                        document.getElementById('total_quiz_question_'+current_answers).style.display="block";


                                        document.getElementById('current_answers').value=current_answers;
                                    }


                                    function removeQuestion() {

                                        if(current_answers>1) {


                                            document.getElementById('total_quiz_question_' + current_answers).style.display = "none";
                                            current_answers = current_answers - 1;

                                            document.getElementById('current_answers').value = current_answers;
                                        }
                                    }


                                </script>

                                <h3>Общие данные опросника КВИЗ</h3><br>

                                <x-inputs.input-text-v
                                        id="quiz_title"
                                        name="quiz_title"
                                        title="Заголовок опросника"
                                        value="{{ $quiz_title  }}"
                                />


                                <x-inputs.summernote-editor
                                        id="quiz_description"
                                        name="quiz_description"
                                        title="Описание опросника"
                                        value="{{ $quiz_description  }}"
                                />


                                <table><tr>
                                        <td>Буклет с ответами:</td><td width="5"></td><td>
                                            <input type="file" name="answer_bucklet">
                                        </td>
                                    </tr></table>

                                @if(@$answer_bucklet!="")

                                    <a href="{{@$answer_bucklet}}" target="_blank">@php
                                            echo basename($answer_bucklet);
                                        @endphp</a>

                                @endif
                                <br><br>




                                <h3>Добавление вопроса в опросник КВИЗ</h3>
                                <input type="hidden" id="current_answers" value="{{$current_answers}}">



                                @for($i=1;$i<=$current_answers+30;$i++)

                                    <div id="total_quiz_question_{{$i}}" style="width:1000px;@if($i<=$current_answers) display: block; @else  display: none; @endif">
                                        <h3>Вопрос №{{$i}}</h3>
                                        <table>
                                            <tr>
                                                <td width="250">
                                                    Укажите текст вопроса:
                                                </td><td width="5"></td>
                                                <td>

                                                    <x-inputs.summernote-editor
                                                            id="quiz_question_text{{$i}}"
                                                            name="quiz_question_text[{{$i}}]"

                                                            value="{{@$quiz_question_text[$i]}}"
                                                    />


                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Укажите тип вопроса:
                                                </td><td width="5"></td>
                                                <td>
                                                    <select name="type_quiz_question[{{$i}}]">
                                                        <option value="one_variant" @if(@$type_quiz_question[$i]=="one_variant") selected @endif>Один вариант</option>
                                                        <option value="many_variants" @if(@$type_quiz_question[$i]=="many_variants") selected @endif>Много вариантов</option>
                                                        <option value="text" @if(@$type_quiz_question[$i]=="text") selected @endif>Текст</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Укажите предлагаемые варианты ответа на вопрос:<br>(пустое поле если вопрос открытый)
                                                </td><td width="5"></td>
                                                <td>
                                                    <textarea name="quiz_variants[{{$i}}]" cols="55" rows="3">{{@$quiz_variants[$i]}}</textarea>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Правильный ответ (или ответы) на вопрос: <br>(за что начисляется балл)
                                                </td><td width="5"></td>
                                                <td>
                                                    <textarea name="quiz_answers[{{$i}}]" cols="55" rows="3">{{@$quiz_answers[$i]}}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Ссылка на видео:<br>(опционально)
                                                </td><td width="5"></td>
                                                <td>
                                                    <input type="text" name="video_link[{{$i}}]" value="{{@$video_link[$i]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Загрузить фото (картинку):<br>
                                                </td><td width="5"></td>
                                                <td>
                                                    <input type="file" name="photo[{{$i}}]"><br>
                                                    @if(@$photo_link[$i]!="")
                                                        <br>
                                                        <a href="{{@$photo_link[$i]}}" target="_blank"><img src="{{@$photo_link[$i]}}" width="150"></a>
                                                        <br>
                                                        <input type="checkbox" name="hide_photo[{{$i}}]" value="1"> Убрать это фото
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                    </div>


                                @endfor

                                <br>
                                <input type="button" onClick="addQuestion()" value="Добавить вопрос">
                                <input type="button" onClick="removeQuestion()" value="Удалить вопрос">

                                <br>
                                <br>

                                <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.personal_quiz', $orgunit) }}" target="_blank" title="{{ __('Просмотр КВИЗа (опросника)') }}"/>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="landing-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">



                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="1" @if($orgunit->landing_type==1) checked @endif></td><td width="5"></td><td>

                                            <h3>1. Лендинг на основе нашего шаблона</h3>
                                            <Br><br>
                                            <table><tr><td>
                                                        <select name="landing_template" style="width:200px;height:28px;">
                                                            <option value="1" @if($orgunit->landing_template==1) selected @endif>Стандартный 1</option>
                                                        </select></td><td width="5"></td><td>

                                                        <x-inputs.button-link type="btn-outline-success"
                                                                              target="_blank"
                                                                              link="{{ $orgunit->landing_address }}" title="{{ __('Просмотр лендинга') }}"/>


                                                    </td></tr></table>

                                        </td> </tr></table>

                                <br>
                                <br>
                                <br>


                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="2"
                                                   @if($orgunit->landing_type==2) checked @endif
                                            ></td><td width="5"></td><td>

                                            <h3>2. Загрузка вашего лендинга с помощью FTP</h3>

                                            <br>
                                            <textarea name="ftp_access" style="width:350px;height:250px" readonly>{{ $orgunit->ftp_access }}</textarea>

                                        </td> </tr></table>

                                <br>
                                <br>
                                <br>

                                <table><tr><td valign="top" style="padding:5px">
                                            <input type="radio" name="landing_type" value="3"
                                                   @if($orgunit->landing_type==3) checked @endif
                                            ></td><td width="5"></td><td>

                                            <h3>3. Установка нашего кода на вашем сайте</h3>
                                            <br>
                                            <textarea name="html_code" style="width:450px" readonly><iframe src="myURL" width="300" height="300" frameBorder="0">{{ $url }}/partners/{{ $orgunit->id }}</iframe>

                                            </textarea>


                                        </td> </tr></table>


                                <br>
                                <br>
                                <br>



                            </div>
                        </div>
                    </div>




                </div>


                <div class="d-flex"  style="margin-left:25px">
                    <x-inputs.submit title="Обновить"/>  <x-inputs.button-link type="btn-outline-success"
                                                                               target="_blank"
                                                                               link="{{ $orgunit->landing_address }}" title="{{ __('Просмотр лендинга') }}"/>

                    </form>



                </div>


            </div>

        </div>
    </div>


@endsection

