@extends('layout.page')

@section('subheader')
    <x-subheader title="Анкета учащегося" />
@endsection

@section('content')
    <div class="container h-50">
        <div class="row h-100">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b h-100">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 px-12">
                                {{--<img class="w-50 d-none d-md-block mb-5" style="transform: scaleX(-1) translate(-100%, 40px);" src="{{ asset('img/green_bot.png') }}"/>--}}
                                <form method="post" class="align-self-end" action="{{ route('quiz.start', $availableQuiz) }}">
                                    @csrf
                                    <button class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill">Заполнить анкету</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-8 font-size-h2 mt-4 mt-md-0 px-12" style="line-height: 3rem;">
                                {!! $availableQuiz->quiz->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
