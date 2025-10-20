@extends ('layout.page')

@section('subheader')
    <x-subheader title="Прохождение КВИЗ организации"/>
@endsection

@section ('content')
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <img alt="{{ $orgunit->title }}" src="{{ asset($orgunit->logoUrl) }}">

                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h2 class="font-size-h1 font-hero">{{ $orgunit->title }}</h2>

                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">

                            {{ @$orgunit->personal_quiz["quiz_title"]}}


                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            {!! @$orgunit->personal_quiz["quiz_description"] !!}
                        </div>


                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h3>Поздравляем!</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h3>Ваш результат {{$result}}%!</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                           <br>
                            <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.personal_quiz', $orgunit) }}"  title="{{ __('Пройти КВИЗ еще раз!') }}"/>

                        </div>


                    </div>


                    <div class="separator separator-solid my-7"></div>


                </div>


                <br><br><br>

                <div class="row">
                    <div class="accordion" id="accordionExample" style="width:100%">
                        <div class="accordion-item">
                            <h1 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Правильные ответы
                                </button>
                            </h1>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @foreach(@$orgunit->personal_quiz["quiz_question_text"] as $pos=>$q_text)

                                            @if($q_text!="" &&  array_key_exists($pos, $questions_correct_answers))
                                                <div class="d-flex align-items-center justify-content-center mt-2 quiztitletext" style="padding-top:25px;border:1px solid black;border-radius:5px;">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <div style="width: 50%;margin: auto">

                                                                    @if(@$orgunit->personal_quiz["photo_link"][$pos]!="")
                                                                        <a href="{{@$orgunit->personal_quiz["photo_link"][$pos]}}"
                                                                           target="_blank">
                                                                            <img src="{{@$orgunit->personal_quiz["photo_link"][$pos]}}"
                                                                                 style="width: 100%;padding: 20px;">
                                                                        </a>
                                                                        <br>
                                                                    @endif


                                                                    @if(@$orgunit->personal_quiz["video_link"][$pos]!="")
                                                                        {{--                                                        <iframe width="600" scrolling="no" height="700" frameborder="0" style="width: 600px; height: 280px;" src="{{@$orgunit->personal_quiz["video_link"][$pos]}}"></iframe>--}}
                                                                        <div id="player"></div>
                                                                        <script src="/js/playerjs.js" type="text/javascript"></script>
                                                                        <script>
                                                                            var player = new Playerjs({
                                                                                id: "player",
                                                                                file: "{{@$orgunit->personal_quiz["video_link"][$pos]}}"
                                                                            });
                                                                        </script>
                                                                        <br><br>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td valign="top" style="font-size: 1rem;">{{$pos}}.</td>

                                                            <td valign="top">
                                                                @php
                                                                    $html_no_rn = str_replace("\r\n", '', $orgunit->personal_quiz["quiz_question_text"][$pos]);
                                                                    $cleanHtml = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $html_no_rn);
                                                                @endphp
                                                                <div>{!!  $cleanHtml  !!}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"></td>
                                                            <td valign="top">

                                                                @php
                                                                    $quiz_variants=explode("\r\n",$orgunit->personal_quiz["quiz_variants"][$pos]);
                                                                @endphp

                                                                @if(@$orgunit->personal_quiz["type_quiz_question"][$pos]=="one_variant")

                                                                    @foreach($quiz_variants as $var_pos=>$quiz_var)

                                                                        <input type="radio" id="answer_{{$var_pos}}_{{$pos}}" name="answer[{{$pos}}]" value="{{$quiz_var}}" @if($quiz_answers[$pos] == $quiz_var) checked @endif disabled>
                                                                        <label for="answer_{{$var_pos}}_{{$pos}}" @if($quiz_answers[$pos] == $quiz_var) style="color:lightgreen" @endif> {{$quiz_var}}</label>
                                                                        <br>

                                                                    @endforeach

                                                                @endif

                                                                @if(@$orgunit->personal_quiz["type_quiz_question"][$pos]=="many_variants")

                                                                    @foreach($quiz_variants as $var_pos=>$quiz_var)
                                                                        @php
                                                                            $quiz_answers_pos_arr = explode("\r\n", $quiz_answers[$pos]);
                                                                        @endphp

                                                                        <input type="checkbox" id="answer_{{$var_pos}}_{{$pos}}" name="answer[{{$pos}}]" value="{{$quiz_var}}" disabled="disabled" @if(in_array($quiz_var, $quiz_answers_pos_arr)) checked @endif>
                                                                        <label for="answer_{{$var_pos}}_{{$pos}}" @if(in_array($quiz_var, $quiz_answers_pos_arr)) style="color:lightgreen" @endif> {{$quiz_var}}</label>
                                                                        <br>

                                                                    @endforeach

                                                                @endif

                                                                @if(@$orgunit->personal_quiz["type_quiz_question"][$pos]=="text")
                                                                    <input type="text" id="answer_{{$pos}}" name="answer[{{$pos}}]" value="{{$quiz_variants[0]}}" @if($quiz_variants[0] === $quiz_answers[$pos]) style="color:lightgreen" @endif>
                                                                    <br>

                                                                @endif

                                                            </td>
                                                        </tr>

                                                    </table>

                                                </div>

                                            @endif

                                        @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h1 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    О компании
                                </button>
                            </h1>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ $orgunit->title }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h1 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Контакты
                                </button>
                            </h1>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <h4 class="font-weight-bold">Юридический адрес</h4>
                                                <p>Регион: {{ $orgunit->legal_region_string }}</p>
                                                <p>Город: {{ $orgunit->legal_city_string }}</p>
                                                <p>Улица: {{ $orgunit->legal_street_string }}</p>
                                                <p>Номер дома: {{ $orgunit->legal_house_string }}</p>
                                            </div>
                                            <div class="col-sm">
                                                <h4 class="font-weight-bold">Фактический адрес</h4>
                                                <p>Регион: {{ $orgunit->fact_region_string }}</p>
                                                <p>Город: {{ $orgunit->fact_city_string }}</p>
                                                <p>Улица: {{ $orgunit->fact_street_string }}</p>
                                                <p>Номер дома: {{ $orgunit->fact_house_string }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-3">--}}
{{--                        <div>--}}
{{--                            <a href="{{  $orgunit->answer_bucklet   }}" target="_blank">--}}
{{--                                <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Правильные ответы</h3>--}}
{{--                            </a>--}}
{{--                            <br>--}}

{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">О компании</h3>--}}
{{--                            <div>{!! $orgunit->about_orgunit !!}</div>--}}
{{--                        </div>--}}
{{--                        <div class="separator separator-solid my-7"></div>--}}
{{--                        <div>--}}
{{--                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Контакты</h3>--}}
{{--                            {!! $orgunit->contacts !!}--}}
{{--                        </div>--}}

{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection

