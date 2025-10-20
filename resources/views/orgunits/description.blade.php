@extends ('layout.page')

@section('subheader')
    <x-subheader title="Описание организации"/>
@endsection

@section ('content')
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-center mt-2">
                           <h2 class="font-size-h1 font-hero">{{ $orgunit->title }}</h2>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ml-7">
                        <div class="symbol symbol-50 symbol-lg-120 min-w-120px">
                            <img alt="{{ $orgunit->title }}" src="{{ $orgunit->logoUrl }}">
                        </div>
                    </div>
                </div>
                <div class="separator separator-solid my-7"></div>

                <div class="row">
                    <div class="col-md-3">
                        <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Карьерные программы</h3>
                        <div>{!! $orgunit->career_program !!}</div>
                    </div>
                    <div class="col-md-6 px-10">
                        <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Мероприятия</h3>
                        @forelse($orgunit->events as $event)
                            <div class="mr-5 mb-5 card p-8 w-100 md-w-50">
                                <div class="d-flex justify-content-between">
                                    <h4 class="font-size-h5 font-hero-super mb-5">
                                        {{ $event->title }}
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <h5 class="font-size-h5 font-weight-bold">Формат</h5>
                                        <h5 class="font-size-h6">{{ $event->format->title }}</h5>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 class="font-size-h5 font-weight-bold">Начало в</h5>
                                        <h5 class="font-size-h6">{{ $event->start_at->format('d.m.Y H:i') }}</h5>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 class="font-size-h5 font-weight-bold">Окончание в</h5>
                                        <h5 class="font-size-h6">{{ $event->finish_at->format('d.m.Y H:i') }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="mr-5 mb-5 order rounded shadow-sm p-10 w-100 md-w-50">
                                <x-alert type="info" text="Не найдено ни одного мероприятия" :close="false"></x-alert>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">О компании</h3>
                            <div>{!! $orgunit->about_orgunit !!}</div>
                        </div>
                        <div class="separator separator-solid my-7"></div>
                        <div>
                            <h3 class="font-size-h3 font-weight-bold font-hero mb-4">Контакты</h3>
                            <div>{!! $orgunit->contacts !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

