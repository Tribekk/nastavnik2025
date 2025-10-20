@extends('layout.page')

@section('subheader')
    <x-subheader title="Мои структурные подразделения"/>
@endsection

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break">{{ $class->school->short_title ?? '-' }}. Структурное подразделение {{ $class->number }}{{ $class->letter }} (год: {{ $class->year ? $class->year : 'не указан' }})</h2>
                        </div>
                        <div class="w-md-325px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            @if(Auth::user()->isTeacher || Auth::user()->isCurator)
                                <a href="{{ route('school.classes.list') }}" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>
                            @endif
                        </div>
                    </div>

                    <br>

                    <h3>Добавление ребенка</h3><br>
                    <form class="form" method="POST" action="{{ route('school.classes.add_student_with_parent_store') }}">
                        @csrf

                        <input type="hidden" name="class_id" value="{{ $class->id }}">

                        <x-inputs.input-text-v name="last_name" title="Фамилия ребенка" required/>

                        <x-inputs.input-text-v name="first_name" title="Имя ребенка" required/>

                        <x-inputs.input-text-v name="middle_name" title="Отчество ребенка"/>

                        <x-inputs.input-text-v name="birth_date" id="birth_date" readonly :date-picker="true" pattern="\d*" placeholder="дд.мм.гггг" title="Дата рождения" required/>

                        <x-inputs.radio-group title="Пол" name="sex">
                            <x-inputs.radio title="Мужской" value="1" name="sex" id="sex_men" checked></x-inputs.radio>
                            <x-inputs.radio title="Женский" value="2" name="sex" id="sex_women"></x-inputs.radio>
                        </x-inputs.radio-group>

                        <x-inputs.input-text-v title="{{ __('Телефон') }}" type="tel" value="{{ old('phone') }}" placeholder="+7 (___) ___ __ __" name="phone" id="phone" prepend-icon="la la-phone" required></x-inputs.input-text-v>

                        <br>
                        <h3>Добавление родителя</h3><br>

                            <x-inputs.input-text-v name="last_name_parent" title="Фамилия родителя" required/>

                            <x-inputs.input-text-v name="first_name_parent" title="Имя родителя" required/>

                            <x-inputs.input-text-v name="middle_name_parent" title="Отчество родителя"/>

                            <x-inputs.input-text-v name="birth_date_parent" id="birth_date_parent" readonly :date-picker="true" pattern="\d*" placeholder="дд.мм.гггг" title="Дата рождения" required/>

                            <x-inputs.radio-group title="Пол" name="sex_parent">
                                <x-inputs.radio title="Мужской" value="1" name="sex" id="sex_men_parent" checked></x-inputs.radio>
                                <x-inputs.radio title="Женский" value="2" name="sex" id="sex_women_parent"></x-inputs.radio>
                            </x-inputs.radio-group>

                            <x-inputs.input-text-v title="{{ __('Телефон') }}" type="tel" value="{{ old('phone') }}" placeholder="+7 (___) ___ __ __" name="phone_parent" id="phone_parent" prepend-icon="la la-phone" required></x-inputs.input-text-v>




                            <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-4 ml-3 mr-3">
                            {{ __('Создать') }}
                        </button>
                    </form>
                </div>



            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#phone").inputmask("+7 (999) 999 99 99");
                $("#phone_parent").inputmask("+7 (999) 999 99 99");
            })
        </script>
    @endpush

@endsection
