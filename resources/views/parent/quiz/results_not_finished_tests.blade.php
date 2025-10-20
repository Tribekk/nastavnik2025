@extends('layout.base')

@section('subheader')
    <x-subheader title="Результаты первичного тестирования"/>
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
                        <x-alert type="info" text="Для того чтобы увидеть результаты ребенок должен пройти все тесты и заполнить анкету" :close="false"></x-alert>
                        <a href="@if(request()->input('backTo', false)) {{ request()->backTo }} @else {{ route('parent.children') }} @endif" class="mt-2 btn btn-outline-primary"><i class="la la-reply mr-2"></i>Вернуться назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
