@extends('layout.base')

@section('subheader')
    <x-subheader title="Кабинет ребенка"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card gutter-b">
            <div class="card-body">
                <h2 class="font-size-h2 text-primary font-weight-bold font-hero">Сводные данные</h2>
                <h3 class="font-size-h3 mb-8">
                    Здесь собраны анкетные данные, Вы можете сравнить ответы на идентичные вопросы –
                    увидеть мнение и видение Вашего ребенка
                </h3>

                @include('parent._children._table')
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="font-size-h2 text-primary font-weight-bold font-hero">Результаты тестирования</h2>
                <h3 class="font-size-h3 mb-8">
                    Вы можете изучить результаты и рекомендации
                </h3>

                @if($children->count())
                    <div class="button-group">
                        <a href="{{ route('observe.user') }}" class="btn btn-primary rounded-pill px-12 py-5 text-center min-h-90px my-2 mx-2 text-break">
                            <span class="d-block font-weight-bold font-size-h4 mb-0">Привязать аккаунт<br>ребенка</span>
                        </a>

                        @foreach($children as $child)
                            <a href="{{ route('parent.children.results', ['child' => $child, 'backTo' => route('parent.children')]) }}" class="btn btn-warning rounded-pill px-12 py-5 min-h-90px text-center my-2 mx-2 text-break">
                                <span class="d-block font-weight-bold font-size-h4 mb-0">Отчет по {{ $child->finishedDepthTests ? 'глубинному тестированию' : 'базовому тесту' }}</span>
                                <span class="d-block font-size-lg mt-0">{{ $child->fullName }}</span>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="font-size-h5">Привяжите аккаунт ребенка чтобы воспользоваться этой функцией</p>
                    <a href="{{ route('observe.user') }}" class="btn btn-primary rounded-pill px-12 py-5 text-center my-2 text-break">Привязать аккаунт ребенка</a>
                @endif
            </div>
        </div>
    </div>
@endsection
