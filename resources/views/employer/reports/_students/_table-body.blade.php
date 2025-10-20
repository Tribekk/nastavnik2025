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
            {{-- №--}}
            {{ $users->firstItem() + $index }}
        </td>

        <td>{{--        ФИО--}}
            {{ $user->full_name }}
        </td>

        <td>
            {{--            Город--}}
            <div class="min-w-120px max-w-120px">
                {{ $user->kladr_name }}
            </div>
        </td>

        <td>
            {{--            Компания--}}
            <div class="min-w-110px max-w-110px">
                {!! $user->school !!}
            </div>
        </td>

        <td>
{{--            Структурное подразделение--}}
            {{ $user->class }}
        </td>

        <td>
{{--            Телефон--}}
            @if($user->phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->phone }}')">{{ $user->phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="">
{{--            E-mail--}}
            <div class="text-break min-w-200px max-w-200px">
                @if($user->email)
                    <a target="_blank" class="link cursor-pointer" href="mailto:{{$user->email}}">{{ $user->email }}</a>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            </div>
        </td>

{{--        <td>--}}
{{--           Телефон руководителя --}}
{{--            @if($user->parent__phone)--}}
{{--                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->parent__phone }}')">{{ $user->parent__phone }}</div>--}}
{{--            @else--}}
{{--                <i class="la la-minus text-muted"></i>--}}
{{--            @endif--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            E-mail руководителя--}}
{{--            <div class="text-break min-w-200px max-w-200px">--}}
{{--                @if($user->parent__email)--}}
{{--                    <a target="_blank" class="link cursor-pointer" href="mailto:{{$user->parent__email}}">{{ $user->parent__email }}</a>--}}
{{--                @else--}}
{{--                    <i class="la la-minus text-muted"></i>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <div class="min-w-250px max-w-250px">--}}
{{--                @if($user->parent_questionnaire_finished)--}}
{{--                   <span class="text-success">Заполнена анкета руководителя</span>--}}
{{--                    <a target="_blank" href="{{ route('quiz.results.parent_questionnaire', $user->parent_id)."?backTo=".urlencode(url()->full()) }}" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>--}}
{{--                @else--}}
{{--                    <span class="text-primary">Нет анкеты руководителя</span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </td>--}}


        <td>
            {{--            Уровень образования--}}
            @if(isset($data['profiler'][$user->id]['education_level']))
                @foreach($data['profiler'][$user->id]['education_level'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Категория сотрудника--}}
            @if(isset($data['profiler'][$user->id]['cat_employee']))
                @foreach($data['profiler'][$user->id]['cat_employee'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Профессия--}}
            @if(isset($data['profiler'][$user->id]['profession']))
                @foreach($data['profiler'][$user->id]['profession'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Квалификация по профессии--}}
            @if(isset($data['profiler'][$user->id]['skill_profession']))
                @foreach($data['profiler'][$user->id]['skill_profession'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Общий стаж работы--}}
            @if(isset($data['profiler'][$user->id]['total_experience']))
                @foreach($data['profiler'][$user->id]['total_experience'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Стаж работы в компании--}}
            @if(isset($data['profiler'][$user->id]['experience_company']))
                @foreach($data['profiler'][$user->id]['experience_company'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{-- Стаж работы в компании в текущей профессии/должности--}}
            @if(isset($data['profiler'][$user->id]['experience_company_position']))
                @foreach($data['profiler'][$user->id]['experience_company_position'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
{{--            Ваш опыт наставничества--}}
            @if(isset($data['profiler'][$user->id]['mentoring_experience']))
                @foreach($data['profiler'][$user->id]['mentoring_experience'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td style="background-color: {{@$data['profiler'][$user->id]['general_data']["background_color"]}};">
            {{--            Степень соответствия общим данным анкеты--}}
            @if(isset($data['profiler'][$user->id]['general_data']))
            {{$data['profiler'][$user->id]['general_data']["description"]}}
            @endif
        </td>

        <td style="background-color: {{@$data['profiler'][$user->id]['result_characters']['result']["background_color"]}};">
            {{--            Соответствие модели компетенций наставника--}}
            {{@$data['profiler'][$user->id]['result_characters']['result']["description"]}}
        </td>

        <td style="background-color: {{@$data['profiler'][$user->id]['personal_characters']['result']["background_color"]}};">
{{--            Общее соответствие модели личностных характеристик наставника--}}
            {{@$data['profiler'][$user->id]['personal_characters']['result']["description"]}}

        </td>

        <td style="background-color: {{@$data['profiler'][$user->id]['prof_characters']['result']["background_color"]}};">
            {{--            Общее соответствие модели профессиональных характеристик наставника--}}
            {{@$data['profiler'][$user->id]['prof_characters']['result']["description"]}}
        </td>

        <td>
            {{--            Анкета--}}
            <div class="min-w-200px max-w-200px">
                @if($user->student_questionnaire_finished)
                    <span class="text-success" style="color:green !important;">Заполнена</span>
                    <a target="_blank" href="{{ route('quiz.user_results', $user->user_id)."#anketa" }}" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                @else
                    <span class="text-primary">Не заполнена</span>
                @endif
            </div>
        </td>

        <td>
{{--            Отметка решения кейсов--}}
            @if($user->user->getTypeThinkingQuizFinishedAttribute(8))
                <div class="text-success">Да</div>
            @else
                <div class="text-primary">Нет</div>
            @endif
        </td>

        <td>
{{--            Отметка ответов на soft вопросы--}}
            @if($user->user->getTypeThinkingQuizFinishedAttribute(13))
                <div class="text-success">Да</div>
            @else
                <div class="text-primary">Нет</div>
            @endif
        </td>

        <td>
{{--            Отметка ответов на hard вопросы--}}
            @if($user->user->getTypeThinkingQuizFinishedAttribute(3))
                <div class="text-success">Да</div>
            @else
                <div class="text-primary">Нет</div>
            @endif
        </td>
        <td>
            {{--            Ориентирован на приобретение нового опыта и саморазвитие--}}
            @if(isset($data['profiler'][$user->id]['personal_characters']['new_experience']))
                @foreach($data['profiler'][$user->id]['personal_characters']['new_experience'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Нацелен на достижение подопечным наилучших результатов, обладает навыками планирования--}}
            @if(isset($data['profiler'][$user->id]['personal_characters']['best_results']))
                @foreach($data['profiler'][$user->id]['personal_characters']['best_results'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
            {{--            Ориентирован на передачу своих знаний и навыков--}}
            @if(isset($data['profiler'][$user->id]['personal_characters']['transfer_skills']))
                @foreach($data['profiler'][$user->id]['personal_characters']['transfer_skills'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>
        <td>
{{--            Проявляет терпение, доброжелательность, объективность--}}
            @if(isset($data['profiler'][$user->id]['personal_characters']['show_objectivity']))
                @foreach($data['profiler'][$user->id]['personal_characters']['show_objectivity'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>
        <td>
{{--            Владеет навыками коммуникации и обратной связи, применяет их в работе с подопечными--}}
            @if(isset($data['profiler'][$user->id]['personal_characters']['communication_skills']))
                @foreach($data['profiler'][$user->id]['personal_characters']['communication_skills'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>
        <td>
{{--            Знание и применение инструментов ОТиПБ--}}
            @if(isset($data['profiler'][$user->id]['prof_characters']['app_otipb']))
                @foreach($data['profiler'][$user->id]['prof_characters']['app_otipb'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>
        <td>
{{--            Понимание процессов организации наставничества--}}
            @if(isset($data['profiler'][$user->id]['prof_characters']['understand_mentor']))
                @foreach($data['profiler'][$user->id]['prof_characters']['understand_mentor'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>

        <td>
{{--            Знание и применение методов обучения и адаптации на производстве--}}
            @if(isset($data['profiler'][$user->id]['prof_characters']['app_methods']))
                @foreach($data['profiler'][$user->id]['prof_characters']['app_methods'] as $type => $item)
                    @if($type=="yellow")
                        @php $type="orange"; @endphp
                    @endif
                    <font color="{{$type}}">{{ $item }}</font>
                @endforeach
            @endif
        </td>


        <td>
{{--            Наставник получил консультацию--}}
            @if($user->got_consultation_status == 'carried_out')
                <span class="text-success">Наставник получил консультацию</span>
            @elseif($user->got_consultation_status == 'invited')
                <span class="font-orange">Приглашен</span>
            @else
                <span class="text-primary">Не приглашен</span>
            @endif
        </td>


        <td>
{{--            Заключение профориентолога /HR --}}
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
{{--            Согласие на целевое обучение--}}
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
                @php
                //dd($user);
                @endphp
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
{{--        <td>--}}
{{--            <div class="min-w-200px max-w-200px">--}}
{{--                <span class="font-blue">Средняя оценка по итогам мероприятий </span>--}}
{{--            </div>--}}
{{--        </td>--}}
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
