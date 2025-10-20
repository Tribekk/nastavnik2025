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
                            <img alt="{{ $orgunit->title }}" src="{{ $orgunit->logoUrl }}">

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

                        <form action="{{ route('orgunits.personal_quiz_send', $orgunit) }}" enctype="multipart/form-data" method="get">
                            @csrf

                           @foreach(@$orgunit->personal_quiz["quiz_question_text"] as $pos=>$q_text)

                               @if($q_text!="")
                                <div class="d-flex align-items-center justify-content-center mt-2" style="padding:25px;border:1px solid #b5b5c3;border-radius:5px;">
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
                                            <td valign="top" style="font-size: 1.7rem;">{{$pos}}.</td>

                                            <td valign="top">
                                                <div> {!!  @$orgunit->personal_quiz["quiz_question_text"][$pos]  !!}</div>
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

                                                        <input type="radio" id="answer_{{$var_pos}}_{{$pos}}"
                                                               name="answer[{{$pos}}]" value="{{$quiz_var}}">
                                                        <label for="answer_{{$var_pos}}_{{$pos}}"> {{$quiz_var}}</label>
                                                        <br>

                                                    @endforeach

                                                @endif

                                                @if(@$orgunit->personal_quiz["type_quiz_question"][$pos]=="many_variants")

                                                    @foreach($quiz_variants as $var_pos=>$quiz_var)

                                                        <input type="checkbox" id="answer_{{$var_pos}}_{{$pos}}"
                                                               name="answer[{{$pos}}][{{$var_pos}}]"
                                                               value="{{$quiz_var}}">
                                                        <label for="answer_{{$var_pos}}_{{$pos}}"> {{$quiz_var}}</label>
                                                        <br>

                                                    @endforeach

                                                @endif

                                                @if(@$orgunit->personal_quiz["type_quiz_question"][$pos]=="text")

                                                    <input type="text" id="answer_{{$var_pos}}_{{$pos}}"
                                                           name="answer[{{$pos}}]">
                                                    <br>

                                                @endif

                                            </td>
                                        </tr>

                                    </table>
                                   </div>

                                @endif

                               @endforeach

                            <div class="d-flex align-items-center justify-content-center mt-2">

                            <x-inputs.submit title="Я закончил тест!"/>
                            </div>
                        </form>
                    </div>


                <div class="separator separator-solid my-7"></div>


                </div>


                <br><br><br>

                <div class="row">

{{--                    <div class="col-md-3">
                        <div>
                            <a href="{{  $orgunit->answer_bucklet   }}" target="_blank">
                                <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Правильные ответы</h3>
                            </a>
                            <br>

                        </div>
                        <div>
                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">О компании</h3>
                            <div>{!! $orgunit->about_orgunit !!}</div>
                        </div>
                        <div class="separator separator-solid my-7"></div>
                        <div>
                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Контакты</h3>
                           {!! $orgunit->contacts !!}
                        </div>

                    </div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection

