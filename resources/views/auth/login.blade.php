@extends('layout.auth')

@section('content')
    <div class="login-form">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Вход в личный кабинет') }}</h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <a href="{{ route('register') }}" id="kt_login_signup" class="text-primary font-weight-bolder">
                        {{ __('Регистрация') }}
                    </a>
                </span>
            </div>

            <x-inputs.input-text-v
                    title="{{ __('Email') }}"
                    type="email"
                    value="{{ old('username') }}"
                    placeholder="example@domain.com"
                    name="username"
                    id="username"
                    prepend-icon="la la-envelope"
                    required
            />

{{--            <div class="form-group">--}}
{{--                <label class="font-size-h6 font-weight-bolder text-dark">{{ __('Телефон')  }}</label>--}}
{{--                <input--}}
{{--                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('username') is-invalid @enderror"--}}
{{--                    type="text"--}}
{{--                    name="username"--}}
{{--                    id="phone"--}}
{{--                    placeholder="+7 (___) ___ __ __"--}}
{{--                    value="{{ old('username') }}"--}}
{{--                />--}}
{{--                @error('username')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Пароль') }}</label>
                    <a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">{{ __('Забыли пароль?') }}</a>
                </div>
                <input
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('password') is-invalid @enderror"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox">
                        <input type="checkbox" class="mr-3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span></span>{{ __('Запомнить меня') }}</label>
                </div>
            </div>

            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Войти') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
@endpush
