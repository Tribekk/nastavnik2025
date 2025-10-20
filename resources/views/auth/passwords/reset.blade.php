@extends('layout.auth')

@section('content')
    <div>
        <form class="form" method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Восстановление пароля') }}</h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <a href="{{ route('login') }}" class="text-primary font-weight-bolder">
                        {{ __('Вход') }}
                    </a>
                </span>
            </div>

            <x-alert type="info" :close="false" text="На введенную Вами почту был отправлен код для подтверждения смены пароля"></x-alert>

            @if(session()->has('email_code'))
                <x-alert type="info" text="{{ __('Код из письма: ' . session('email_code')) }}" :close="false"></x-alert>
            @endif

            <div class="form-group">
                <label for="code" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Код смены пароля')  }}</label>
                <input
                    id="code"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('code') is-invalid @enderror"
                    type="text"
                    name="code"
                    value="{{ old('code') }}"
                    autocomplete="code"
                />
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Пароль') }}</label>
                <input
                    id="password"
                    type="password"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('password') is-invalid @enderror"
                    name="password"
                >

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Пароль еще раз') }}</label>
                <input
                    id="password-confirm"
                    type="password"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation"
                >

                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="pb-lg-0 pb-5">
                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Сменить пароль') }}
                </button>
            </div>

        </form>

    </div>
@endsection
