@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком организаций"/>
@endsection

@section ('content')
    <div class="container">

        <div class="card card-custom">

            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">


                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#common-tab">

                                    <span class="nav-text font-size-lg">{{ __('Общая информация') }}</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#user-tab">

                                    <span class="nav-text font-size-lg">
                                    {{ __('Пользователь') }}
                                </span>
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




                    </ul>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="tab-content">

                    <div class="tab-pane show px-7 active" id="common-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">



                                <form action="{{ route('admin.orgunits.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf


                                    <x-inputs.image id="logo" name="logo" title="Логотип"/>

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название"/>

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название"/>

                                    <x-inputs.select2 id="legal_form_id" name="legal_form_id"
                                                      required
                                                      url="{{ route('admin.orgunits.legal_forms.view') }}"
                                                      selectedUrl="/admin/orgunits/legal_forms"
                                                      title="Организационно-правовая форма"
                                                      placeholder="Выбор организационно-правовой формы"/>


                                    <x-inputs.address id="legal_address" city=""  name="legal_address" title="Юридический адрес" required="true"/>

                                    <x-inputs.address id="fact_address" city=""  name="fact_address" title="Фактический адрес"  required="true"/>


                                    <input type="text" name="parent_id" id="parent_id" value="{{ old('parent_id', request('parent_id')) }}" hidden>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="user-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">


                                <x-inputs.input-text-v id="first_name" name="first_name" :required="true" title="Имя ответственного"/>

                                <x-inputs.input-text-v id="first_name" name="last_name" :required="true" title="Фамилия ответственного"/>

                                <x-inputs.input-text-v id="first_name" name="middle_name" :required="true" title="Отчество ответственного"/>

                                <x-inputs.input-text-v name="birth_date" id="birth_date" readonly :date-picker="true" pattern="\d*" placeholder="дд.мм.гггг" title="Дата рождения" required/>


                                <x-inputs.radio-group title="Пол" name="sex">
                                    <x-inputs.radio title="Мужской" value="1" name="sex" id="sex_men_parent" checked></x-inputs.radio>
                                    <x-inputs.radio title="Женский" value="2" name="sex" id="sex_women_parent"></x-inputs.radio>
                                </x-inputs.radio-group>

                                <x-inputs.input-text-v title="{{ __('Телефон ответственного') }}" type="phone" value="{{ old('phone') }}" placeholder="+7 (___) ___ __ __" name="phone" id="phone" prepend-icon="la la-phone" required></x-inputs.input-text-v>




                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="location-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <script>
                                    var search_location=1;
                                    var loaded= [];
                                </script>

                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
                                @for($i=1;$i<=10;$i++)


                                    <div id="main_div_location_{{$i}}" style="display:none">

                                     <x-inputs.address id="search_location_{{$i}}" city=""  name="search_location_{{$i}}" title="Область поиска наставников №{{$i}}"  required="true"/>


                                        <br>
                                        <table><tr><td>Компания: </td><td width="5"></td><td>
                                                    <select name="schools_id_{{$i}}" id="schools_id_{{$i}}">

                                                    </select>
                                                </td></tr></table>


                                        <br>
                                        <table><tr><td>Структурное подразделение: </td><td width="5"></td><td>
                                                    <select name="class_id_{{$i}}[]" id="class_id_{{$i}}" multiple="multiple">

                                                    </select>
                                                    <input type="hidden" name="school_value_{{$i}}" id="school_value_{{$i}}" value="">

                                                </td></tr></table>
                                        <br>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#class_id_{{$i}}').select2({
                                                width: '300px',
                                                placeholder: "Выберите структурное подразделение",
                                                allowClear: true
                                            });

                                            $(document).on('change', '#search_location_{{$i}}-city', function () {
                                                console.log('Город изменен');
                                                get_schools({{$i}});

                                            });

                                            $(document).on('change', 'select#schools_id_{{$i}}', function () {
                                                console.log('Компания изменена');
                                                get_classes({{$i}});
                                            });
                                        });
                                    </script>
                                @endfor


                                <script>
                                    current_location=1;
                                    var loaded= new Map([]);


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

                                                result.forEach(function (item) {

                                                    var option = document.createElement('option');
                                                    option.value = item.number + item.letter;

                                                    current_class_in_classes = class_id.indexOf((item.number + item.letter))
                                                    if (current_class_in_classes >= 0) {
                                                        option.selected = true;
                                                        values_classes_select2.push(item.number + item.letter);
                                                    }

                                                    option.text = item.number + item.letter;
                                                    selectElement.add(option);

                                                });

                                                $('#class_id_' + id).val(values_classes_select2).trigger('change');
                                            });
                                        }
                                    }

{{--                                    @for($i=1;$i<=10;$i++)--}}
{{--                                    setInterval(function() {--}}
{{--                                        get_schools({{$i}});--}}
{{--                                        get_classes({{$i}});--}}
{{--                                    },1000);--}}
{{--                                    @endfor--}}


                                    function autoren (item) {
                                        console.log ("Favorit " + item.id+" "+item.text)
                                    }




                                    function addLocation() {
                                        document.getElementById('main_div_location_'+current_location).style.display="block";

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
                                <input type="hidden" name="current_location" id="current_location" value="1">



                                <input type="button" onClick="addLocation()" value="Добавить область поиска">
                                <input type="button" onClick="removeLocation()" value="Убрать область поиска">

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane show px-7" id="profiles-tab" role="tabpanel">
                        <div class="row">

                            <div class="col-xl-7 my-2">

                                <x-inputs.select2 id="activity_kind_id" name="activity_kind_id[]"
                                                  required title="Профили работодателя"
                                                  placeholder="Выбор профиля" event="setActivityKindId"
                                                  multiple
                                                  value="{{ is_array(old('activity_kind_id')) ? implode(',', old('activity_kind_id')) : '' }}"
                                                  url="{{ route('admin.orgunits.activity_kinds.view') }}"
                                                  selected-url="/admin/orgunits/activity_kinds"
                                />


                            </div>
                        </div>
                    </div>




                </div>

                <br>

                <div style="margin-left:25px">

                <x-inputs.submit title="Добавить"/>

                <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.orgunits.view') }}" title="{{ __('К списку организаций') }}"/>

                </div>
                </form>
            </div>

        </div>
    </div>

@endsection
