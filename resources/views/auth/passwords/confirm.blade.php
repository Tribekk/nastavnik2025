@extends('layout.auth')

@section('content')
    <div>
        <form class="form" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Требуется подтверждение') }}</h3>
            </div>

            {{ __('Для продолжения работы требуется ввод пароля.') }}

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

            <div class="pb-lg-0 pb-5">
                <button type="button" id="kt_login_signin_submit"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Подтвердить') }}
                </button>
            </div>
        </form>
    </div>
@endsection
