@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="container">
                        <div class="d-flex">
                            <img src="{{ asset('img/green_bot.png') }}" style="transform: scaleX(-1)" class="max-h-125px mr-5 d-md-block d-none" alt="">
                            <div>
                                <h1 class="font-alla font-pixel font-size-h1">Уважаемый родитель, поздравляем!</h1>
                                <p class="font-size-h4 font-weight-bold">Приглашаем Вашу семью перейти на следующий этап - получить бесплатную консультацию</p>

                               <ol class="font-size-h5 px-5">
                                   <li>для этого ребенок проходит углубленное тестирование, дополняющее базовый портрет</li>
                                   <li>и затем Вы вместе получите бесплатную 1,5 часовую онлайн-консультацию профориентолога</li>
                               </ol>

                                <p class="font-size-h4 font-weight-bold mt-5">
                                    Для этого запланируйте удобное время для 1,5-часовой онлайн-встречи<br>
                                    Можно выбирать будни и выходные, с 8 до 22 часов, с 20 ноября до 25 декабря
                                </p>

                                @if(!Auth::user()->school_id)
                                    <x-alert type="light-info" text='Пожалуйста, укажите компанию, в которой обучается Ваш ребенок<br><a href="/user/edit#school_id">Перейти в настройки профиля</a>' :close="false"></x-alert>
                                @endif

                                @if(!Auth::user()->observedUsers()->count())
                                    <x-alert type="light-info" text="Для корректной работы платформы требуется привязка ребенка к Вашему аккаунту" :close="false"></x-alert>
                                @endif

                                <div class="mt-8 button-group font-hero">

                                    <a href="{{ route('consultations.record.form') }}" class="btn @if(!Auth::user()->observedUsers()->count()) disabled btn-light @else btn-warning @endif rounded-pill px-12 py-5 min-h-80px min-w-md-275px max-w-md-275px my-2 mx-2 d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                        <span class="d-block font-weight-bold m-0">Выбрать время</span>
                                        <span class="d-block font-weight-bold m-0">консультации с ребенком</span>
                                    </a>

                                    @if(Auth::user()->consultations()->count())
                                        <a href="{{ route('consultations.list') }}" class="btn btn-warning rounded-pill px-12 py-5 min-h-80px min-w-md-275px max-w-md-275px my-2 mx-2 d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                            <span class="d-block font-weight-bold m-0">Консультации</span>
                                        </a>
                                    @endif

                                    <form action="{{ route('quiz.supplement', $questionnaire) }}" method="post" class="d-inline-block min-w-md-275px max-w-md-275px w-100 w-md-auto w-sm-50 mx-2">
                                        @csrf
                                        <button class="btn btn-warning px-12 py-5 font-weight-bold my-2 mx-2 rounded-pill min-h-80px d-inline-flex align-items-center flex-column justify-content-center w-100">
                                            <span class="d-block font-weight-bold m-0">Изменить анкету</span>
                                        </button>
                                    </form>

                                    <a href="{{ route('parent.children') }}" class="btn @if(!Auth::user()->observedUsers()->count()) btn-light disabled @else btn-warning @endif px-12 py-5 min-h-80px min-w-md-275px max-w-md-275px font-weight-bold my-2 mx-2 rounded-pill d-inline-flex align-items-cente flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                        <span class="d-block font-weight-bold m-0">Перейти в кабинет</span>
                                        <span class="d-block font-weight-bold m-0">ребенка</span>
                                    </a>

                                    <a href="{{ route('observe.user') }}" class="btn btn-warning px-12 py-5 font-weight-bold my-2 mx-2 rounded-pill min-h-80px min-w-md-275px max-w-md-275px d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                        <span class="d-block font-weight-bold m-0">Привязать аккаунт ребенка</span>
                                    </a>

                                    <a href="{{ route('feedback.form') }}" class="btn btn-warning px-12 py-5 font-weight-bold my-2 mx-2 rounded-pill min-h-80px min-w-md-275px max-w-md-275px d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                        <span class="d-block font-weight-bold m-0">Дать обратную связь</span>
                                    </a>

                                    <a href="{{ route('quiz.restart', $questionnaire) }}" class="btn btn-primary px-12 py-5 min-h-80px min-w-md-300px max-w-md-300px font-weight-bold my-2 mx-2 rounded-pill d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                        <span class="d-block font-weight-bold m-0">Заполнить анкету заново</span>
                                        <span class="d-block m-0 opacity-75">Предыдущие результаты будут удалены</span>
                                    </a>

                                    @if($children->count())
                                        @foreach($children as $child)
                                            <a href="{{ route('parent.children.results', $child) }}?backTo={{ route('dashboard') }}" class="btn btn-warning px-12 py-5 font-weight-bold my-2 mx-2 rounded-pill min-h-80px min-w-md-300px max-w-md-300px d-inline-flex align-items-center flex-column justify-content-center w-100 w-md-auto w-sm-50">
                                                <span class="d-block font-weight-bold m-0">Отчет по {{ $child->finishedDepthTests ? 'глубинному тестированию' : 'базовому тесту' }}</span>
                                                <span class="d-block m-0 opacity-75">{{ $child->fullName }}</span>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
