@extends('layout.base')

@section('subheader')
    <x-subheader title="Результат, твой профиль"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <h1 class="card-title">Результаты</h1>
                    </div>
                    <div class="card-body">
                        <x-alert type="info" text="Для того чтобы увидеть результаты необходимо пройти все Вопросы и Кейс" :close="false"></x-alert>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
