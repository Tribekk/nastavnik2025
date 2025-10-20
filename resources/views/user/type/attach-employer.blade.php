@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h1 class="font-weight-bolder text-primary font-pixel font-size-h1 mb-4">{{ __('Добро пожаловать') }}</h1>
                            <h4 class="font-hero font-size-h5">Чтобы попасть в личный кабинет работодателя, просим Вас заполнить форму</h4>
                        </div>
                        @include('user.type._employer-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
