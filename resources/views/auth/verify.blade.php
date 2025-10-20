@extends('layout.page')

@section('subheader')
    <x-subheader title="Требуется подтверждение почты"/>
@endsection

@section('content')
    <div class="container">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Ссылка отправлена.') }}
            </div>
        @endif

        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
            <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <i class="la la-envelope-open-text icon-3x"></i>
                    </span>
            </div>
            <div class="alert-text">
                {{ __('Проверьте свою почту.') }}

                @if (session('resent'))
                    {{ __('На Ваш адрес отправлена новая ссылка.') }}
                @else
                    {{ __('На Ваш адрес отправлена ссылка для подтверждения.') }}
                @endif

                {{ __('Если Вы не получили ссылку, то') }}
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда') }}</button>
                    {{ __(' для получения еще одной ссылки') }}.
                </form>
            </div>
        </div>
    </div>
@endsection
