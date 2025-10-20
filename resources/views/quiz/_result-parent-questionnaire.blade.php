@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <h2 class="font-weight-bold font-size-h1 text-primary mb-6">Благодарю!</h2>

                    <div class="row mb-8">
                        <div class="col-md-2 d-none d-md-block text-right">
                            <img class="img-fluid d-md-block mb-5" style="transform: scaleX(-1) translate(0, -20px);" src="{{ asset('img/green_bot.png') }}"/>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-dark font-size-h2 mb-7">Мы получили анкету, спасибо за Ваше время и ответы!</h3>

                            <p class="text-dark-50 font-size-h4">Далее, после регистрации детей в компании,<br>
                                Вы сможете привязать аккаунт своего ребенка и изучать его профиль и рекомендации,<br>
                                получать уведомления о мероприятиях, обучении и карьере</p>
                        </div>
                    </div>

                    <div class="row">
                        <a href="{{ route('parent.children') }}" class="btn btn-warning px-8 py-4 rounded-pill mx-3 my-3">Кабинет ребенка</a>
                        <a href="{{ route('observe.user') }}" class="btn btn-warning px-8 py-4 rounded-pill mx-3 my-3">Привязать аккаунт ребенка</a>

                        <form action="{{ route('quiz.supplement', $availableQuiz) }}" method="post">
                            @csrf
                            <button class="btn btn-warning px-8 py-4 rounded-pill mx-3 my-3">Изменить анкету</button>
                        </form>
                        <a href="{{ route('feedback.form') }}" class="btn btn-warning px-8 py-4 rounded-pill mx-3 my-3">Дать обратную связь</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
