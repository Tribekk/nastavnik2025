@extends('layout.register')

@section('content')
    <div>

        <form class="form" method="POST" action="{{ route('register.verify') }}">
            @csrf

            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Подтверждение регистрации') }}</h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    {{ __('Уже зарегистрированы?') }}
                    <a href="{{ route('login') }}" class="text-primary font-weight-bolder">
                        {{ __('Вход') }}
                    </a>
                </span>
            </div>

            <p>На введенную Вами почту был отправлен код для подтверждения регистрации.</p>

            <?php
                /**
                 * Патч от 18.10.2020
                 *
                 * TODO
                 * Убрать когда будут решены проблемы смс на Мотив.
                 */
            ?>

            @if(session()->has('email_code') && env('APP_ENV') !== 'production')
                <x-alert type="info" text="{{ __('Код из письма: ' . session('email_code')) }}" :close="false"></x-alert>
            @endif

{{--            <p>--}}
{{--                Не получили код?--}}
{{--                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#code">--}}
{{--                    Нажмите сюда--}}
{{--                </button>--}}
{{--            </p>--}}
{{--            <div class="collapse" id="code">--}}
{{--                <x-alert type="info" text="{{ __('Код: ' . session('email_code')) }}" :close="false"></x-alert>--}}
{{--            </div>--}}

            <x-inputs.input-text-v title="{{ __('Код подтверждения регистрации') }}" type="text" value="{{ old('code') }}" placeholder="Введите код" name="code" id="code" prepend-icon="la la-key" required></x-inputs.input-text-v>

            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox">
                        <input type="checkbox" class="mr-3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span></span>{{ __('Запомнить меня') }}</label>
                </div>
            </div>

            <div class="pb-lg-0 pb-5">
                <a href="{{ route('register') }}" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Назад') }}
                </a>

                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Зарегистрироваться') }}
                </button>
            </div>

        </form>

    </div>
@endsection
