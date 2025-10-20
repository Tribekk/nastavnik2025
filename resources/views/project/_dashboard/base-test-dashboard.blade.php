<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="max-w-md-500px text-center mb-6">
{{--                <img src="{{ asset('img/girl_with_skate.png') }}" class="img-fluid max-w-md-300px mr-md-30" style="transform: translate(-15px, 50px)" alt="Анкета">--}}


                <div class="text-left mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h2 mb-2">О ТЕБЕ</h3>
                    <p class="font-size-h4 text-dark">Фиксирует текущие общие сведения</p>
                </div>

                <div class="text-left mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h2 mb-2">ГОТОВНОСТЬ К ВЫБОРУ</h3>
                    <p class="font-size-h4 text-dark">Отражает карьерные предпочтения и образ будущего</p>
                </div>

                <div class="text-left mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h2 mb-2">МОТИВЫ ВЫБОРА</h3>
                    <p class="font-size-h4 text-dark">Указывают на ключевые ориентиры любой деятельности</p>
                </div>
            </div>
            <div class="text-dark font-size-h3 mb-5 mb-md-0">{!! $questionnaire->quiz->caption !!}</div>
        </div>
        <div class="col-md-4 align-self-center">
            @if($questionnaire->state->fillable())
                <a href="{{ route('quiz.description', $questionnaire) }}" class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">Личностные характеристики</a>
            @else
                <form action="{{ route('quiz.supplement', $questionnaire) }}" method="post" class="col-12">
                    @csrf
                    <button class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">Личностные характеристики</button>
                </form>
            @endif

            <span class="text-dark d-block text-center align-items-center col-12">
               Время заполнения: {{ $questionnaire->quiz->minutes }} минут
            </span>
            <div class="d-flex flex-column">
                <a href="{{ route('quiz.results', ['backTo' => route('dashboard')]) }}" class="col-12 btn btn-warning px-8 py-5 font-weight-bold my-2 rounded-pill">СМОТРЕТЬ РЕЗУЛЬТАТЫ</a>
                <div class="text-center my-2">
                    <a href="{{ route('quiz.view') }}" class="col-12 btn btn-warning px-8 py-5 w-100 font-weight-bold rounded-pill">ПРОЙТИ ТЕСТЫ</a>
                </div>
            </div>
        </div>
    </div>
{{--     @if(!Auth::user()->observers()->count())--}}
{{--        <x-alert type="light-info" text="Для корректной работы платформы требуется привязка родителя к Вашему аккаунту" :close="false"></x-alert>--}}
{{--    @endif--}}
</div>
