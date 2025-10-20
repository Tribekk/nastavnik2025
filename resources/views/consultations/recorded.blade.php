@extends('layout.base')

@section('subheader')
    <x-subheader title="Консультации"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="mb-6">
                    <a href="{{ route('consultations.list') }}" class="text-primary link font-size-h4">К списку консультаций</a>
                </div>

                <div class="d-flex">
                    <img src="{{ asset('img/green_bot.png') }}" class="h-225px img-fluid d-md-block d-none" style="transform: scaleX(-1)" alt="">
                    <div class="ml-5 mt-md-8 mt-3">
                        <h2 class="font-size-h1 font-pixel font-alla">Выбранное время забронировано</h2>
                        <p class="font-size-h5 mt-8">
                            Подтверждение консультации, данные профориентолога и ссылку на онлайн-встречу {{ $consultation->communicationTypeLabel }} мы отправим в Ваш личный кабинет в течение 5 дней
                        </p>
                        @if(Auth::user()->hasRole('parent'))
                        <p class="font-weight-bold font-size-h5 mt-6">
                            До этого ознакомьтесь с результатами всех тестов,<br>
                            и если нужно, напомните ребенку о глубинном тестировании
                        </p>
                        @endif
                        <p class="font-size-h5 text-dark-50 mt-6">
                            Обращаем Ваше внимание, что эти этапы абсолютно бесплатны,
                            но при необходимости получения дополнительных консультаций по Вашему желанию,
                            новые встречи оплачиваются и оформляются как отдельная услуга
                        </p>

                        @if(Auth::user()->hasRole('parent'))
                            <div class="mt-8 button-group font-hero">
                                <a href="{{ route('parent.children.results', $consultation->child) }}?backTo={{route('consultations.show', $consultation)}}" class="btn btn-primary rounded-pill px-12 py-5 min-w-md-275px my-2 mx-2 d-inline-flex align-items-center flex-column justify-content-center w-100 max-w-400px w-sm-auto">
                                    <span class="d-block font-weight-bold m-0">Проверить результаты глубинного тестирования ребенка</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
