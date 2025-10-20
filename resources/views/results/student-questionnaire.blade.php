@extends ('layout.page')

@section('subheader')
    <x-subheader title="Результаты"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('results.student_questionnaire') }}">
            @include('results._student-questionnaire._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Наставники завершившие анкетирование') }}</x-slot>

            @if ($users->count() > 0)
                @include('results._student-questionnaire._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного пользователя.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
