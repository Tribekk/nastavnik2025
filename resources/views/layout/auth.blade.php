<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.partials._head')
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="login login-1 login-signin-on d-flex flex-column flex-column-fluid bg-white" id="kt_login">
        {{--                <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: var(--primary)">--}}
        <img class="bgImg" src="../../img/bootBg.png" alt="">
        <div class="login-aside d-flex flex-column flex-row-auto">
            <div class="wrapLogo d-flex mx-auto flex-column-auto flex-column pt-lg-40 pt-15 text-center ">
                <a href="{{ url('/') }}" class="text-center mainLogo">
                    <img src="{{ asset('img/blueLogo.png') }}" class="max-h-70px" alt=""/>
                </a>
                <h1 class="font-pixel text-uppercase text-center text-white d-none" class="font-pixel text-uppercase text-center text-white">Профтрекер</h1>
            </div>
            {{--            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/media/svg/illustrations/login-visual-1.svg)"></div>--}}
        </div>
        <div
            class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto w-100">
            <div class="d-flex flex-column-fluid flex-center">
                @yield('content')
            </div>
            {{--                <div class="d-flex flex-column flex-lg-row justify-content-lg-start justify-content-center align-items-start py-7 py-lg-0">--}}
            {{--                    <a href="#" class="text-primary font-weight-bolder font-size-h5">{{ __('Условия использования') }}</a>--}}
            {{--                    <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">{{ __('Политика конфиденциальности') }}</a>--}}
            {{--                    <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">{{ __('Контакты') }}</a>--}}
            {{--                </div>--}}
        </div>
    </div>
</div>

@include('layout.partials.kt-settings')

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<script src="{{ asset('js/pages/crud/forms/widgets/input-mask.js') }}"></script>

<livewire:scripts/>
@stack('scripts')
</body>
</html>
