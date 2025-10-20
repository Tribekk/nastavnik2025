@extends('layout.auth')

@section('content')
    <div>
        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Восстановление пароля') }}</h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <a href="{{ route('login') }}" id="kt_login_signup" class="text-primary font-weight-bolder">
                        {{ __('Вход в систему') }}
                    </a>
                </span>
            </div>

            @error('sms_error')
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

            <div class="pb-lg-0 pb-5">
                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('Отправить код для восстановление пароля') }}
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
