@extends ('layout.page')

@section('subheader')
    <x-subheader title="Редактирование критериев"/>
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                        Редактирование критериев отбора (анкета) профиля "{{ $userProfile->title }}">
                    </div>
                </div>
                <div class="card-body">

                    <div style="width:100%" align="right">
                    <table><tr><td>
                    <a href="{{ route('user_profiles.edit',$userProfile->id) }}">
                        <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' На главную') }}</div>
                    </a>

                            </td><td width="5"></td><td>


                                <a href="{{ route('user_profiles.base_test_items',$userProfile->id) }}">
                                    <div style="border-radius:5px;padding:5px;background-color:#fcfef6">{{ __(' Следующий блок >') }}</div>
                                </a>

                            </td>
                        </tr></table>
                    </div>

                    <br>


                    @include('admin.user_profiles.include.result_messages')
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $("#text_{{ $anketItems->first()->id }}_profession_ready_green").select2({
                                placeholder: "Готовность к выбору профессии",
                                allowClear: true
                            });
                            $("#text_{{ $anketItems->first()->id }}_profession_ready_yellow").select2({
                                placeholder: "Готовность к выбору профессии",
                                allowClear: true
                            });
                            $("#text_{{ $anketItems->first()->id }}_profession_ready_red").select2({
                                placeholder: "Готовность к выбору профессии",
                                allowClear: true
                            });
                        });
                    </script>
                    <form action="{{ route('user_profiles.ankets_update',$anketItems->first()->id) }}" method="POST" >

                        @csrf
                        <table>
                            <tr>
                                <td width="40"></td>
                                <td width="90%">

                                    <div class="row">


                                        <div class="col-xs-50 col-sm-50 col-md-50">
                                            <div class="form-group">


                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">№</th>

                                                        <th scope="col">Вопрос</th>
                                                        <th scope="col">Зеленая зона</th>
                                                        <th scope="col">Желтая зона</th>
                                                        <th scope="col" >Красная зона</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $pos=1
                                                    @endphp
                                                    @foreach($questions as $item)



                                                        @if($item->type()->first()->code!="text" and
                                                        $item->type()->first()->code!="select_city"
                                                           )


                                                            @if($item->id!=106 and $item->id!=107 and $item->id!=108 and
                                                            $item->id!=109 and $item->id!=110 and $item->id!=112 and $item->id!=113 and
                                                            $item->id!=114 and $item->id!=115)

                                                        <tr>
                                                            <td>
                                                                {{ $pos }}
                                                            </td>
                                                            <td>
                                                              {{ $item->content }}
                                                            </td>
                                                            <td style="background-color:#38957B">
                                                                @php
                                                                    $type="green"
                                                                @endphp
                                                              @include('admin.user_profiles.include.anket_items_question_form')

                                                            </td>
                                                            <td  style="background-color:#FFC35F">

                                                                @php
                                                                    $type="yellow"
                                                                @endphp
                                                                @include('admin.user_profiles.include.anket_items_question_form')


                                                            </td>

                                                            <td  style="background-color:#FF4F06">

                                                                @php
                                                                    $type="red"
                                                                @endphp
                                                                @include('admin.user_profiles.include.anket_items_question_form')


                                                            </td>
                                                        </tr>


                                                        @php $pos=$pos+1
                                                        @endphp

                                                        @endif


                                                        @endif
                                                    @endforeach

                                                    <tr>
                                                        <td>
                                                            {{ ($pos)  }}
                                                        </td>
                                                        <td>
                                                            Степень соответствия общим данным анкеты
                                                        </td>
                                                        <td class="text-center" style="background-color:#38957B">
                                                            @php
                                                                //dd($type, $control_values);
                                                                    $type="green";
                                                                    $value_start = 0;$value_end = 0;
                                                                    if(key_exists($type, $control_values) && key_exists('general_data', $control_values[$type])){
                                                                        if (key_exists('start', $control_values[$type]['general_data'])) $value_start = $control_values[$type]['general_data']['start'];
                                                                        if (key_exists('end', $control_values[$type]['general_data'])) $value_end = $control_values[$type]['general_data']['end'];
                                                                    }
                                                            @endphp
                                                            c
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][start]" value="{{$value_start}}" size="5">
                                                            по
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][end]" value="{{$value_end}}" size="5">

                                                        </td>
                                                        <td class="text-center" style="background-color:#FFC35F">

                                                            @php
                                                                $type="yellow";
                                                                $value_start = 0;$value_end = 0;
                                                                    if(key_exists($type, $control_values) && key_exists('general_data', $control_values[$type])){
                                                                        if (key_exists('start', $control_values[$type]['general_data'])) $value_start = $control_values[$type]['general_data']['start'];
                                                                        if (key_exists('end', $control_values[$type]['general_data'])) $value_end = $control_values[$type]['general_data']['end'];
                                                                    }
                                                            @endphp
                                                            c
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][start]" value="{{$value_start}}" size="5">
                                                            по
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][end]" value="{{$value_end}}" size="5">

                                                        </td>

                                                        <td class="text-center" style="background-color:#FF4F06">

                                                            @php
                                                                $type="red";
                                                                $value_start = 0;$value_end = 0;
                                                                    if(key_exists($type, $control_values) && key_exists('general_data', $control_values[$type])){
                                                                        if (key_exists('start', $control_values[$type]['general_data'])) $value_start = $control_values[$type]['general_data']['start'];
                                                                        if (key_exists('end', $control_values[$type]['general_data'])) $value_end = $control_values[$type]['general_data']['end'];
                                                                    }
                                                            @endphp
                                                            c
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][start]" value="{{$value_start}}" size="5">
                                                            по
                                                            <input type="number" min="0" max="100" name="anketItems[{{$type}}][general_data][end]" value="{{$value_end}}" size="5">

                                                        </td>
                                                    </tr>



                                                    </tbody>


                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        </table>
                        <div style="width:100%" align="right">
                            <table><tr><td>
                                        <a href="{{ route('user_profiles.edit',$userProfile->id) }}">
                                            <div style="border-radius:5px;padding:5px;background-color:#fcfef6;">{{ __(' На главную') }}</div>
                                        </a>

                                    </td><td width="5"></td><td>


                                        <a href="{{ route('user_profiles.base_test_items',$userProfile->id) }}">
                                            <div style="border-radius:5px;padding:5px;background-color:#fcfef6">{{ __(' Следующий блок >') }}</div>
                                        </a>

                                    </td>
                                </tr></table>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">

                         <button type="submit" class="btn btn-primary">Сохранить</button>
                            <x-inputs.button-link type="btn-outline-success" link="{{ route('user_profiles.edit',$userProfile->id) }}" title="{{ __(' Назад') }}"/>
                        </div>

                    </form>
                    <br>


            </div>
        </div>
    </div>
    </div>

@endsection
