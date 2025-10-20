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

                <div class="mb-12">
                    <a role="button" class="link font-size-h3" href="{{ route('quiz.result', $availableQuiz) }}">К результату теста</a>
                </div>

                <div class="text-right font-size-h5 mb-18">
                    Подходящий типаж выделен <span class="font-blue font-weight-bold">синим</span> цветом
                </div>

                <div class="row justify-content-center">
                    @foreach($professionalTypeValues as $type)
                        <div class="col-lg-3 col-md-4 col-6">
                            <a href="{{ route('quiz.person-type-detail', [$availableQuiz, $type->type_id]) }}" class="d-flex flex-wrap flex-column align-items-center">
                                <img class="max-h-100px max-w-100px max-h-sm-125px max-w-sm-125px img-fluid" src="{{ asset("/img/professions/".($type->active ? $type->type->activeImage : $type->type->inActiveImage)) }}" alt="{{ $type->type->title }}">
                                <span class="font-size-md-h4 font-size-lg text-center font-blue font-weight-bold my-4">
                                    {{ $type->type->title }}
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
