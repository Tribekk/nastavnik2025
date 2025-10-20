@extends('layout.page')

@section('subheader')
    <x-subheader title="Мои структурные подразделения"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

            @forelse($classes as $class)
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <a href="{{ route('school.classes.show.table', ['class' => $class->id]) }}" class="d-flex link align-items-center text-primary text-hover-danger text-hover-primary font-size-h2 font-weight-bold mr-3">
                                        {{ $class->school->short_title ?? '-' }}. Структурное подразделение {{ $class->number }}{{ $class->letter }} (год: {{ $class->year ? $class->year : 'не указан' }}, кол-во учащихся: {{ $class->students_count ?? 'не указано' }})
                                    </a>
                                </div>
                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-2 row">
                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Руководители</div>
                                        <span class="font-size-h5">
                                            @if(!Auth::user()->hasRole('curator') && !Auth::user()->isAdmin)
                                                {{ Auth::user()->fullName }}
                                            @else
                                                @forelse($class->curators as $curator)
                                                    {{ $curator->user->fullName }}{{ !$loop->last ? ', ' : '.' }}
                                                @empty
                                                    не указан
                                                @endforelse
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Зарегистрировано</div>
                                        <span class="font-size-h5">{{ $class->students()->count() }} {{ num2word($class->students()->count(), ['человек', 'человека', 'человек']) }}</span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Статус проекта</div>

                                        @php
                                            $status = $wrapper->takeStatusQuizzesClass($class->students);
                                        @endphp

                                        <span class="font-size-h5 {{ $status['class_color'] }}">{{ $status['status_label'] }}</span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Отметка заполнения анкеты</div>

                                        @php
                                            $mark = $wrapper->markQuestionnaireStudents($class->students);
                                        @endphp

                                        <span class="font-size-h5 {{ $mark['class_color'] }}">{{ $mark['label'] }}</span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения базового теста</div>

                                        @php
                                            $mark = $wrapper->markBaseTestStudents($class->students);
                                        @endphp

                                        <span class="font-size-h5 {{ $mark['class_color'] }}">{{ $mark['label'] }}</span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Приглашены на глубинный тест</div>
                                        @php
                                            $data = $wrapper->studentsInvitedDepthTests($class->students);
                                        @endphp
                                        <div class="font-size-h5">{{ $data['label'] }} ({{ $data['percentage'] }}%)</div>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Получили консультацию</div>

                                        @php
                                            $data = $wrapper->studentsFinishedConsultation($class->students);
                                        @endphp

                                        <div class="font-size-h5">{{ $data['label'] }} ({{ $data['percentage'] }}%)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <x-alert type="info" text="На данный момент нет структурных подразделений" :close="false"></x-alert>
            @endforelse

            {{ $classes->links() }}
        </div>
    </div>
@endsection
