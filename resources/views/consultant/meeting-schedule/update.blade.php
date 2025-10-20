@extends('layout.base')

@section('subheader')
    <x-subheader title="График консультаций"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="font-hero mb-0 font-size-h4">
                    Редактирование времени консультации
                </h1>
            </div>
            <div class="card-body">
                <form action="{{ route('consultant.meeting_schedule.update', $appointment) }}" method="post">
                    @csrf

                    <x-inputs.input-text-v title="Выберите день"
                                           required
                                           placeholder="Дата"
                                           :value="$appointment->date_at"
                                           :date-picker="true"
                                           name="date_at" id="date_at"/>

                    <x-inputs.select title="Выберите временной промежуток (по уральскому времени)"
                                        required
                                        :current-value="$appointment->time_interval_id"
                                        :values="$timeIntervals"
                                        name="time_interval_id" id="time_interval_id"/>

                    <div>
                        <a href="{{ route('consultant.meeting_schedule') }}" class="btn btn-outline-primary">Назад</a>
                        <button class="btn btn-primary">Продолжить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
