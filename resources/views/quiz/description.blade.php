@extends('layout.page')

@section('subheader')
    <x-subheader title="Описание" />
@endsection

@section('content')

    <div class="container h-50">
        <div class="row h-100">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b h-100">

                    <div class="card-body">
                        <h3 class="font-pixel font-orange font-size-h1 mb-10">
                            {{ $availableQuiz->quiz->title }}
                        </h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                {{--<img class="w-50 d-none d-md-block mb-5" src="{{ asset('img/bot.png') }}"/>--}}
                                <form method="post" class="align-self-end mb-8 md-md-0" action="{{ route('quiz.start', $availableQuiz) }}">
                                    @csrf
                                    <button class="btn {{$availableQuiz->quiz->id ==3 ? 'btn-green':'btn-info'}} px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">{{ $availableQuiz->quiz->title == "Кейсы" ? 'Решить кейсы' : 'Ответить на вопросы' }}</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-8 font-size-h2" style="line-height: 3rem;">
                                {!! $availableQuiz->quiz->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
