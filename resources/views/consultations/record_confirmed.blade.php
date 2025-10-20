@extends('layout.base')

@section('subheader')
    <x-subheader title="Консультация"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="mb-6">
                    <a href="{{ route('consultations.list') }}" class="text-primary link font-size-h4">К списку консультаций</a>
                </div>

                <div class="d-flex">
                   {{-- <img src="{{ asset('img/green_bot.png') }}" class="h-225px img-fluid d-md-block d-none" style="transform: scaleX(-1)" alt=""> --}}
                    <div class="ml-5 mt-md-8 mt-3">
                        <h2 class="font-size-h1 font-pixel font-alla">Консультация подтверждена</h2>
                        <p class="font-size-h3 mt-8 mb-2">
                            @if(Auth::user()->hasRole('parent'))
                                Ждем Вас с ребенком
                            @else
                                Ждем Вас
                            @endif
                        </p>

                        <p class="font-size-h4 font-weight-bold mt-0">{{ $consultation->formattedStartAt }}</p>

                        @if($consultation->communication_type_value)
                            <p class="font-size-h5 text-dark-50 my-6 text-break">
                                В указанное время подключайтесь на встречу {{ $consultation->communicationTypeLabel }} по ссылке:<br><a class="link" href="{{ $consultation->communication_type_value }}">{{ $consultation->communication_type_value }}</a>
                            </p>
                        @else
                            <p class="font-size-h5 text-dark-50 my-6">
                                Ссылку на встречу {{ $consultation->communicationTypeLabel }} отправит консультант <span class="font-alla">{{ $consultation->consultant->fullName }}</span>
                            </p>
                        @endif
                        <p class="font-size-h5 text-dark-50">
                            Ваш консультант:
                        </p>

                       <div class="mt-8 mb-8">
                           @include('consultant.business-card._business-card.card', ['user' => $consultation->consultant])
                       </div>

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
