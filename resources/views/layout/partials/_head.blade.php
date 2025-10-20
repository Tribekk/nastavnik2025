<base href="">
<meta charset="utf-8"/>
<title>@yield('title', 'Профтрекер')</title>
<meta name="description" content="Профтрекер - цифровой сервис профориентации и планирования карьеры. 
Управление карьерным треком в смартфоне.">
<meta name="yandex-verification" content="83d315d91e6cde0b" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<!--<meta name='robots' content='noindex,nofollow'/>-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap"
    rel="stylesheet">
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
<!--end::Global Theme Styles-->

<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/themes/layout/aside/light.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/pages/wizard/wizard-2.css') }}" rel="stylesheet" type="text/css">
<!--end::Layout Themes-->

<link rel="stylesheet" href="{{ asset('plugins/custom/summernote/summernote.min.css') }}">
<link href="{{ mix('css/app.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>

<livewire:styles/>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.5.0/dist/alpine.min.js" defer></script>

@stack('css')
