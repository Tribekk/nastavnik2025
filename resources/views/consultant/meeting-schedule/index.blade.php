@extends('layout.base')

@section('subheader')
    <x-subheader title="График консультаций"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="font-pixel text-primary font-size-h2">
                    Задайте удобное время консультаций
                </h1>
                <h3 class="font-hero font-size-h4">Укажите, в какие дни и время вам удобно проводить консультации</h3>
                {{--<h4 class="font-size-h4">с 17 ноября до 30 декабря с 8 до 22 по уральскому времени</h4>--}}
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-6">
                    <a href="{{ route('consultant.meeting_schedule.create') }}" class="btn btn-success">
                        <i class="la la-plus"></i> Новая консультация
                    </a>
                </div>

                @error('error')
                    <x-alert type="danger" text="{{ $message }}"></x-alert>
                @enderror

                <div class="row">
                    <div class="col-12 col-md-9 order-2 order-md-1">
                        @if($appointments->count() > 0)
                            @include('consultant.meeting-schedule._index._table')
                        @else
                            <div class="mt-5">
                                <x-alert type="info" text="Не удалось найти консультации соответствующие вашему запросу" :close="false"></x-alert>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-md-3 order-1 order-md-2">
                        @include('consultant.meeting-schedule._index._search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
