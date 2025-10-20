<div class="d-flex py-3">
    {{-- <img src="{{ asset('img/bot.png') }}" alt="" class="max-h-125px img-fluid mr-8 d-sm-block d-none"> --}}
    <div class="mt-5">
        <h1 class="font-size-h1 font-pixel font-orange">Привет!<br>Приглашаем пройти следующий этап</h1>

        <ol class="mt-8 font-size-h5 p-5">
            <li class="font-weight-bold">Выдели 20-30 минут и пройди 4 теста,
                чтобы расширить твой портрет талантов, мотивов и интересов</li>
            <li class="">Затем вместе с родителями получите консультацию профориентолога
                с разъяснениями результатов тестов, задайте вопросы, утвердитесь в выборе будущего!</li>
        </ol>

        @php
            $notResultQuizzes = Auth::user()->notResultQuizzes();
            $requiredToPass = "Для того, чтобы записаться на консультацию необходимо завершить:";
            $requiredToPass .= "<ul>";
            foreach ($notResultQuizzes as $quiz) {
                $requiredToPass .= "<li>";
                $requiredToPass .= $quiz->type == "form" ? 'Анкета' : 'Тест';
                $requiredToPass .= " ".mb_strtolower($quiz->title);
                $requiredToPass .= "</li>";
            }
            $requiredToPass .= "</ul>";
        @endphp
        <x-alert type="light-danger" text="{!! $requiredToPass !!}" :close="false"></x-alert>

{{--        @if(!Auth::user()->observers()->count())--}}
{{--            <x-alert type="light-info" text="Для корректной работы платформы требуется привязка родителя к Вашему аккаунту" :close="false"></x-alert>--}}
{{--        @endif--}}

        <div class="mt-12 d-flex flex-wrap">
            <a href="{{ route('quiz.view') }}#depth-tests" class="btn btn-info mx-3 w-sm-auto w-100 my-2  rounded-pill font-weight-bold font-size-h5 font-hero px-14 hover-opacity-90 py-4 text-center">
                пройти углубленное
                <br>
                тестирование
            </a>

            <a href="{{ route('quiz.results', ['backTo' => route('dashboard')]) }}" class="btn btn-warning mx-3 my-2 w-sm-auto w-100 rounded-pill font-size-h5 px-14 hover-opacity-90 py-4 text-center">
                результаты
                <br>
                первичный тест
            </a>
        </div>
    </div>
</div>
