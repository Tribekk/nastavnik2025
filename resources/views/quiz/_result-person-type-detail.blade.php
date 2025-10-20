@extends('layout.base')

@section('subheader')
    <x-subheader title="Результаты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="font-pixel font-blue font-size-h1 mb-10">
                    Итоговые результаты
                </h3>

                <div class="mb-8">
                    <a role="button" class="link font-size-h3" href="{{ request('backTo') ? request('backTo') : route('quiz.person-types', $availableQuiz) }}">К списку типажей</a>
                </div>

                <div class="row my-7">
                    <div class="col-md-3">
                        <img class="svg-icon-4x" src="{{ asset("/img/professions/{$type->type->activeImage}") }}" alt="{{ $type->type->title }}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="font-size-h2 font-blue font-weight-bold">{{ $type->type->title }}</h2>
                        <div class="mb-7">
                            {!! $type->type->description !!}
                        </div>

                        <div>
                            <h3 class="font-size-h3 font-blue">Подходящие профессии</h3>
                            @foreach($type->professions as $profession)
                                {!! $profession->title !!};
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
