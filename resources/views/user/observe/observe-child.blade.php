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
                            <h3 class="font-weight-bolder text-primary font-pixel h1">{{ __('Привязать аккаунт ребенка') }}</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 d-md-block d-none">
                                <img src="{{ asset('img/girl.png') }}" alt="Девочка" class="img-fluid">
                            </div>
                            <div class="col-lg-8 col-md-6 col-12">
                                @include('user.observe._observe-child-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
