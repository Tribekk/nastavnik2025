<tbody class="datatable-body">
@foreach($users as $index => $user)

    @php
    $User = \Domain\User\Models\User::where('id', $user->user_id)->first();
            $color_td="";
    @endphp
    @if(@$data['profiler'][$user->id]['color']=="green")

        @php
            $color_td='lightgreen';
        @endphp

        @endif

    @if(@$data['profiler'][$user->id]['color']=="red")

        @php
            $color_td='#ff8c8a';
        @endphp

    @endif

    @if(@$data['profiler'][$user->id]['color']=="yellow")

        @php
            $color_td='yellow';
        @endphp

    @endif
    <tr class="font-size-lg">
        <td class="fit">
            {{ $users->firstItem() + $index }}
        </td>

        <td>
            {{ $user->full_name }}
        </td>

        <td>
            <div class="min-w-120px max-w-120px">
                {{ $user->kladr_name }}
            </div>
        </td>

        <td>
            <div class="min-w-110px max-w-110px">
                {!! $user->school !!}
            </div>
        </td>

        <td>
            {{ $user->class }}
        </td>

        <td>
            @if($user->phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->phone }}')">{{ $user->phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="">
            <div class="text-break min-w-200px max-w-200px">
                @if($user->email)
                    <a target="_blank" class="link cursor-pointer" href="mailto:{{$user->email}}">{{ $user->email }}</a>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            </div>
        </td>

        <td>
            @if($user->parent__full_name)
                {{ $user->parent__full_name }}
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
        <td>
            @if($user->parent__phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->parent__phone }}')">{{ $user->parent__phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
        <td>
            <div class="text-break min-w-200px max-w-200px">
                @if($user->parent__email)
                    <a target="_blank" class="link cursor-pointer" href="mailto:{{$user->parent__email}}">{{ $user->parent__email }}</a>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            </div>
        </td>
        <td>
            <div class="min-w-250px max-w-250px">
                @if($user->parent_questionnaire_finished)
                   <span class="text-success">Заполнена анкета родителя</span>
                    <a target="_blank" href="{{ route('quiz.results.parent_questionnaire', $user->parent_id)."?backTo=".urlencode(url()->full()) }}" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                @else
                    <span class="text-primary">Нет анкеты родителя</span>
                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @if($user->student_questionnaire_finished)
                    <span class="text-success">Да</span>
                    <a target="_blank" href="{{ route('quiz.user_results', $user->user_id)."#anketa?backTo=".urlencode(url()->full()) }}" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                @else
                    <span class="text-primary">Нет</span>
                @endif
            </div>
        </td>



        <td  style="background-color: {{$color_td}};">
            <div class="min-w-80px">
                @php
                //dd($data['profiler'][$user->id]);
                @endphp
                @if(@$data['profiler'][$user->id]['color']=="green")
                        Соответствует  профилю
                @endif
                    @if(@$data['profiler'][$user->id]['color']=="yellow")
                        Частично соответствует  профилю
                    @endif
                    @if(@$data['profiler'][$user->id]['color']=="red")
                        Не соответствует  профилю
                    @endif
            </div>
        </td>


        <td  style="background-color: {{$color_td}};">
            <div class="min-w-200px max-w-200px">


                     @if(@$data['profiler'][$user->id]['color']=="green")
                        Соответствует целевому профилю
                    @endif
                    @if(@$data['profiler'][$user->id]['color']=="yellow")
                        Частично соответствует целевому профилю
                    @endif
                    @if(@$data['profiler'][$user->id]['color']=="red")
                        Не соответствует целевому профилю
                    @endif

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=@$data['profiler'][$user->id]['favorite_lessons'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                    @php $type="orange"; @endphp
                                @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=$data['profiler'][$user->id]['medium_score'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif



            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
            @php
                @$items_profiles=$data['profiler'][$user->id]['future_view'];
            @endphp

            @if(!is_null($items_profiles))

                @foreach($items_profiles as $type=>$items)

                    @foreach($items as $item)

                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{{ $item }}</font><br>

                    @endforeach
                @endforeach
            @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['own_city'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $items }}</font><br>


                    @endforeach
                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=$data['profiler'][$user->id]['limit_health'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['personal_character'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif
            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['motivations'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif
            </div>
        </td>


        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=$data['profiler'][$user->id]['targetOrder'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach
                @endif


            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=$data['profiler'][$user->id]['ready_profession'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{{ $items }}</font><br>


                    @endforeach
                @endif

            </div>
        </td>


        <td>
            <div class="min-w-200px max-w-200px">

                <div class="min-w-80px">
                    @if($user->base_tests_finished)
                        <span class="text-success">Да</span>
                        <a target="_blank" href="{{ route('quiz.user_results', $user->user_id)."?backTo=".urlencode(url()->full()) }}" data-toggle="tooltip" title="Просмотр результатов тестирования" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                    @else
                        @if($user->base_tests_precentage)
                            <span class="font-orange d-block">{{ $user->base_tests_precentage }}%</span>
                        @else
                            <span class="text-primary d-block">Нет</span>
                        @endif
                    @endif
                </div>

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px font-blue">
                {{ $user->professional_types_str }}
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <!--<span class="{{ $user->baseStepSelectionColorClass }}">Портрет личности</span>-->
                    @if(!empty($User->characterTraitResult->values) && count($User->characterTraitResult->values)>0)
                        @foreach($User->characterTraitResult->values as $value)
                            <div class="{{ $value->is_higher ? 'text-warning' : 'font-alla' }}">
                                <b>{{ $value->title }}</b> - {{ $value->percentage }}%
                            </div>
                        @endforeach
                    @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                @php
                    @$items_profiles=$data['profiler'][$user->id]['tipag'];
                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach

                @endif

            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                @php
                    @$items_profiles=$data['profiler'][$user->id]['alt_component'];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)


                                @if($type=="yellow")
                                    @php $type="orange"; @endphp
                                @endif

                    @if(is_string($items))

                                <font color="{{$type}}">{{ $items }}</font><br>
                    @else
{{--                         {{ //dd($items)  }}--}}

                        @endif



                    @endforeach

                @endif


            </div>
        </td>
        <td>
            <div class="min-w-80px">
                @if($user->depth_tests_finished)
                    <span class="text-success">Да</span>
                    <a target="_blank" href="{{ route('quiz.user_results', $user->user_id)."?backTo=".urlencode(url()->full()) }}#inclinations" data-toggle="tooltip" title="Просмотр результатов тестирования" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                @else
                    @if($user->depth_tests_precentage)
                        <span class="font-orange d-block">{{ $user->depth_tests_precentage }}%</span>
                    @else
                        <span class="text-primary d-block">Нет</span>
                    @endif
                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                @php
                    @$items_profiles=$data['profiler'][$user->id]['inclinations'];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)

                        @foreach($items as $item)

                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $item }}</font><br>

                        @endforeach
                    @endforeach

                @endif


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                @php
                    @$items_profiles=$data['profiler'][$user->id]['intellegense_level'];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{{ $items }}</font><br>


                    @endforeach

                @endif


            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">


                @php
                    @$items_profiles=$data['profiler'][$user->id]['type_of_thinking'];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                            @if($type=="yellow")
                                @php $type="orange"; @endphp
                            @endif

                            <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif


            </div>
        </td>

        <td>
            <div class="min-w-200px max-w-200px">

                @php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][1];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif

           </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][2];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][4];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][3];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @php
                    @$items_profiles=$data['profiler'][$user->id]['situation'][5];

                @endphp

                @if(!is_null($items_profiles))

                    @foreach($items_profiles as $type=>$items)



                        @if($type=="yellow")
                            @php $type="orange"; @endphp
                        @endif

                        <font color="{{$type}}">{!!   $items !!}</font><br>


                    @endforeach

                @endif
            </div>
        </td>










        <td>
            @if($user->got_consultation_status == 'carried_out')
                <span class="text-success">Ребенок получил консультацию</span>
            @elseif($user->got_consultation_status == 'invited')
                <span class="font-orange">Приглашен</span>
            @else
                <span class="text-primary">Не приглашен</span>
            @endif
        </td>
        <td>
            @if($user->got_consultation_status_with_parent == 'carried_out')
                <span class="text-success">Родитель получил консультацию</span>
            @elseif($user->got_consultation_status_with_parent == 'invited')
                <span class="font-orange">Приглашен</span>
            @else
                <span class="text-primary">Не приглашен</span>
            @endif
        </td>
        <td>
            <div class="min-w-200px max-w-200px text-center">
                <span class="font-blue">
                    @if($user->recommend == 'recommend')
                        Рекомендован
                    @elseif($user->agree == 'not_recommend')
                        Не рекомендован
                    @else
                        Нет информации
                    @endif
                </span>
            </div>
        </td>
        <td>
            <div class="min-w-150px max-w-150px">
                @if($user->agree == 'agree')
                    <span class="font-blue">Согласен</span>
                @elseif($user->agree == 'not_agree')
                    <span class="font-blue">Не согласен</span>
                @elseif($user->agree == 'think')
                    <span class="font-blue">Думает</span>
                @else
                    <span class="font-blue">Нет информации</span>
                @endif
            </div>
        </td>
        <td>
            <div class="min-w-150px max-w-150px">
                <span class="font-blue">{{ $user->count_visited_events }}</span> / <span class="text-primary">{{ $user->count_events }}</span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> Направление </span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> {{ $user->events_formats }} </span>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                @if($data["personal_quiz"][$user->id]==0)

                   <font color="red">Нет</font>
                    @else

                        Да, {{ $data["personal_quiz"][$user->id] }} баллов

                    @endif

            </div>
        </td>
<!--        <td>-->
<!--            <div class="min-w-200px max-w-200px">-->
<!--                <span class="font-blue">Средняя оценка по итогам мероприятий </span>-->
<!--            </div>-->
<!--        </td>-->
        <td>
            <div class="text-nowrap">
                <livewire:employer.students.selection-results :row="$user"></livewire:employer.students.selection-results>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
              <textarea id="personal_notes_{{$user->id}}_simple" cols="15" rows="3" onInput="save_personal_notes({{$user->id}}, 'simple')" onChange="save_personal_notes({{$user->id}}, 'simple')">{{ @$data["note_simple"][$user->id] }}</textarea>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">{{--Участие в мероприятиях олимпиадах--}}
                <textarea id="personal_notes_{{$user->id}}_events" cols="15" rows="3" onInput="save_personal_notes({{$user->id}}, 'events')" onChange="save_personal_notes({{$user->id}}, 'events')">{{ @$data["note_events"][$user->id] }}</textarea>
            </div>
        </td>
        <td>
            <div class="min-w-200px max-w-200px">
                <span class="font-blue"> Единое окно обмена и хранения </span>
            </div>
        </td>









        <td>
            <div class="min-w-200px max-w-200px">
                <span class="{{ $user->depthStepSelectionColorClass }}">
                    @if(!empty($user->depth_tests_finished))
                        {{ $user->depthStepSelectionLabel }}
                    @else
                        Не прошел тесты
                    @endif
                </span>
            </div>
        </td>
        <td>
            @if($user->recommend == 'recommend')
                <span class="text-success">Рекомендован</span>
            @elseif($user->recommend == 'not_recommend')
                <span class="text-primary">Не рекомендован</span>
            @else
                <span class="text-primary">Нет информации</span>
            @endif
        </td>


        <td>
           <div class="min-w-300px d-flex flex-column">
               <button class="btn btn-success px-4 mt-1" onclick="sendNotify({{$user->user_id}})">Отправить сообщение</button>
               <button class="btn btn-success px-4 mt-1" onclick="sendInviteEvent({{$user->user_id}})">Пригласить на мероприятие</button>
               @if(!$user->base_tests_finished)
                    <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests({{$user->user_id}}, 'base')">Пригласить на базовое тестирование</button>
               @endif
               @if(!$user->depth_tests_finished)
                    <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests({{$user->user_id}}, 'depth')">Пригласить на углубленное тестирование</button>
               @endif
               <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests({{$user->user_id}}, 'personal_quiz')">Пригласить на квиз</button>

           </div>
        </td>








        <td>
            <div class="min-w-200px">
                @if($user->invited_depth_tests)
                    <span class="text-success">Приглашен</span>
                @else
                    <span class="text-muted d-block">Не приглашен на глубинное тестирование</span>
                @endif
            </div>
        </td>
    </tr>

@endforeach
</tbody>

@push('scripts')
    <script>
        function sendInviteTests(userId = null, type) {
            const titleTypes = {
                depth: 'Приглашение на глубинное тестирование',
                base: 'Приглашение на базовое тестирование',
                personal_quiz: 'Приглашение КВИЗ работодателя',
            };

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст приглашения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст приглашения" rows="4"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">${titleTypes[type]}</h2>`,
                html: inputMessage,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const message = document.getElementById('swal__message').value;

                    return $.post(userId ? `/employer/send_invite/${userId}` : `/employer/send_invite`, {
                        message,
                        type: type+'_tests',
                        users: {{ $user_ids ?? [] }},
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Приглашение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });

        }
        var tmp_sms_js = [];
@php
    $titleSms = '';

    $field_tmp_sms = auth()->user()->tmp_sms;
    if (!empty($field_tmp_sms)){
    $titleSms = '<div class="form-group text-left"><select id="tmp-sms" class="form-control form-control-solid py-2 px-3 rounded-lg">';
    $titleSms .= '<option>Выберите шаблон sms</option>';;

    $tmpSms = unserialize(auth()->user()->tmp_sms);

    foreach ($tmpSms as $key => $tmp) {
        $zag = $tmp['zag'];
        $text = $tmp['text'];
        $url =  $tmp['url'];
        $titleSms .= '<option value="'.$key.'">'.$zag.'</option>';
@endphp

    tmp_sms_js[{{ $key }}] = ['{{$zag}}', '{{ str_replace(PHP_EOL, '\n', $text) }}', '{{ $url }}'];
    @php
    }
     $titleSms .= '</select></div>';
 @endphp

    $(document).on('change', '#tmp-sms', function () {
        let key_tmp_sms = $(this).val()
        $('#swal__title').val(tmp_sms_js[key_tmp_sms][0]);
        $('#swal__message, #swal-sms__message').text(tmp_sms_js[key_tmp_sms][1]);
        $('#swal__url').val(tmp_sms_js[key_tmp_sms][2]);
    });
        @php
        }
        @endphp
        const selectSms = '<div>@php echo $titleSms; @endphp</div>';

        function sendNotify(userId = null) {

            const inputTitle =
                '<div class="form-group text-left">' +
                '<label for="swal__title" class="font-size-h6 font-weight-bolder text-dark required">Введите заголовок сообщения</label>' +
                '<input name="title" class="form-control form-control-solid py-2 px-3 rounded-lg" id="swal__title" placeholder="Заголовок сообщения"/>' +
                '</div>';

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст сообщения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст сообщения" rows="6"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            const inputUrl =
                '<div class="form-group text-left">' +
                '<label for="swal__url" class="font-size-h6 font-weight-bolder text-dark">Введите ссылку, которую отобразить пользователю</label>' +
                '<input name="title" class="form-control form-control-solid py-2 px-3 rounded-lg" id="swal__url" placeholder="Заголовок сообщения"/>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">Отправка сообщения</h2>`,
                html: selectSms + inputTitle + inputMessage + inputUrl,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const title = document.getElementById('swal__title').value;
                    const message = document.getElementById('swal__message').value;
                    const url = document.getElementById('swal__url').value;

                    return $.post( userId ? `/employer/send_notify/${userId}` : `/employer/send_notify`, {
                        title,
                        message,
                        url,
                        users: {{ $user_ids ?? [] }},
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Сообщение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });
        }

        function sendInviteEvent(userId = null, type) {
            var events = '';

            @if(Auth::user()->orgunitEvents)
                @foreach(Auth::user()->orgunitEvents as $event)
                    events += '<option value="{{ $event->id }}">{{ $event->title }}</option>';
                @endforeach
            @endif

            const inputEvent =
                '<div class="form-group text-left">' +
                '<label for="swal__event" class="font-size-h6 font-weight-bolder text-dark required">Выберите мероприятие</label>' +
                '<select name="event_id" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" style="width: 100%;" id="swal__event">'+events+'</select>' +
                '</div>';

            const inputMessage =
                '<div class="form-group text-left">' +
                '<label for="swal__message" class="font-size-h6 font-weight-bolder text-dark required">Введите текст приглашения</label>' +
                '<textarea name="message" style="resize: none" class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg" id="swal__message" placeholder="Текст приглашения" rows="4"></textarea>' +
                '<div class="text-dark-50 mt-2" style="font-size:13px;">* Ссылка будет автоматически подставлена</div>' +
                '</div>';

            Swal.fire({
                title: `<h2 class="font-weight-bold font-size-h3 p-0 mb-5 font-hero">Приглашение на мероприятие</h2>`,
                html: inputEvent + inputMessage,
                confirmButtonColor: 'var(--success)',
                confirmButtonText: 'Отправить',
                showCancelButton: true,
                cancelButtonText: 'Закрыть',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                width: 600,
                preConfirm: () => {
                    const message = document.getElementById('swal__message').value;
                    const eventId = document.getElementById('swal__event').value;

                    return $.post(userId ? `/employer/send_invite_event/${userId}` : `/employer/send_invite_event`, {
                        message,
                        event_id: eventId,
                        users: {{ $user_ids ?? [] }},
                    }).then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Успешно',
                            confirmButtonColor: 'var(--success)',
                            html: `Приглашение отправлено`,
                        });

                        return 1;
                    }).catch(error => {
                        let message = '';

                        if(!!error.message) {
                            message = error.message;
                        } else if(error.responseJSON.errors) {
                            const firstKey = Object.keys(error.responseJSON.errors)[0];
                            message = error.responseJSON.errors[firstKey][0];
                        } else if (error.responseJSON.message) {
                            message = error.responseJSON.message;
                        } else {
                            message = error;
                        }

                        Swal.showValidationMessage(`${message}`);
                    });
                },
            });
        }
    </script>
@endpush
