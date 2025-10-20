@extends('layout.register')

@section('content')
    <div>

        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Регистрация') }}</h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    {{ __('Уже зарегистрированы?') }}
                    <a href="{{ route('login') }}" class="text-primary font-weight-bolder">
                        {{ __('Вход') }}
                    </a>
                </span>
            </div>

            @error('sms_register_error')
                <x-alert type="danger" text="{{ $message }}" :close="false"></x-alert>
            @enderror

            <x-inputs.input-text-v
                    title="{{ __('Email') }}"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="example@domain.com"
                    name="email"
                    id="email"
                    prepend-icon="la la-envelope"
                    required
            />

{{--            <x-inputs.input-text-v title="{{ __('Телефон') }}" type="tel" value="{{ old('phone') }}" mask="+ 7 (###) ### ## ##" placeholder="+7 (___) ___ __ __" name="phone" id="phone" prepend-icon="la la-phone"  required></x-inputs.input-text-v>--}}

            <div class="form-group">
                <label for="last_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Фамилия') }}</label>
                <input
                    id="last_name"
                    type="text"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('last_name') is-invalid @enderror"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    autocomplete="last_name">

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="first_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Имя') }}</label>
                <input
                    id="first_name"
                    type="text"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('first_name') is-invalid @enderror"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    autocomplete="first_name">

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="middle_name" class="font-size-h6 font-weight-bolder text-dark">{{ __('Отчество') }}</label>
                <input
                    id="middle_name"
                    type="text"
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('middle_name') is-invalid @enderror"
                    name="middle_name"
                    value="{{ old('middle_name') }}"
                    autocomplete="middle_name">

                @error('middle_name')
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

            <div class="form-group">
                <div class="checkbox-inline @error('pd_agree') is-invalid @enderror">
                    <label class="checkbox">
                        <input type="checkbox" class="mr-3" name="pd_agree" {{ old('pd_agree') ? 'checked' : '' }}>
                        <span></span>{{ __('Даю согласие на обработку своих персональных данных') }}</label>
                </div>
                <div class="mt-4">
                    <a class="font-size-h5" href="{{ url('политика_конфиденциальности.pdf') }}" target="_blank">Политика конфиденциальности</a>
                </div>
                @error('pd_agree')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="pb-lg-0 pb-5">
                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Продолжить') }}
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
