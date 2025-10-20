<div class="d-flex py-3">
    <img src="{{ asset('img/bot.png') }}" alt="" class="max-h-125px img-fluid mr-8 d-sm-block d-none">
    <div class="mt-5">
        <h1 class="font-size-h1 font-pixel font-orange">Отлично, все тесты пройдены</h1>
        <h5 class="font-size-h4 font-weight-bold">Ты молодец!</h5>

        <p class="mt-8 mb-0 font-weight-bold font-size-h5">Теперь с родителями выберите удобное время консультации</p>
        <p class="mt-0 mb-0 font-weight-bold font-size-h5">Проверь, возможно, дата уже запланирована, если нет, напомни родителям о необходимости:</p>
        <ul class="mt-0 mb-4 font-size-h5 p-5">
            <li>зарегистрироваться</li>
            <li>заполнить анкету</li>
            <li>назначить дату онлайн-встречи с профориентологом</li>
        </ul>

{{--        @if(!Auth::user()->observers()->count())--}}
{{--            <x-alert type="light-info" text="Для корректной работы платформы требуется привязка родителя к Вашему аккаунту" :close="false"></x-alert>--}}
{{--        @endif--}}

        <div class="mt-8 button-group font-hero">
            <a href="{{ route('consultations.list') }}" class="btn  @if(Auth::user()->consultations()->count()) btn-warning @else btn-secondary disabled @endif rounded-pill px-12 py-5 min-h-80px min-w-md-275px my-2 mx-2 d-inline-flex align-items-center flex-column justify-content-center w-100 w-sm-auto">
                <span class="d-block font-weight-bold m-0">Проверить время</span>
                <span class="d-block font-weight-bold m-0">консультации</span>
            </a>

            <a href="{{ route('quiz.results', ['backTo' => route('dashboard')]) }}" class="btn btn-warning rounded-pill px-12 py-5 min-h-80px min-w-md-275px my-2 mx-2 d-inline-flex align-items-center flex-column justify-content-center w-100 w-sm-auto">
                <span class="d-block font-weight-bold m-0">Посмотреть результаты</span>
                <span class="d-block font-weight-bold m-0">полного тестирования</span>
            </a>
        </div>
    </div>
</div>
