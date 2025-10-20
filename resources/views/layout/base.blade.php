<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.partials._head')
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
@include('layout.partials._header-mobile')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        @include('layout.partials._aside')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('layout.partials._header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @include('layout.partials._subheader.subheader')

                @yield('content')
            </div>
            @include('layout.partials._footer')
        </div>
    </div>
</div>

@include('layout.partials._extras.offcanvas.quick-user')

@include('layout.partials._extras.chat')

@include('layout.partials._extras.scrolltop')

{{--@include('layout.partials._extras.toolbar')--}}

{{--@include('layout.partials._extras.offcanvas.demo-panel')--}}

@include('layout.partials.kt-settings')
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('js/pages/widgets.js') }}"></script>
<!--end::Page Scripts-->
<script src="{{ asset('js/bootstrap-datepicker.ru.min.js') }}" charset="UTF-8"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.ru.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/custom/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('plugins/custom/summernote/lang/summernote-ru-RU.min.js') }}"></script>
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<livewire:scripts />

@stack('scripts')

<script>
    window.addEventListener('show-notification', event => {
        toastr[event.detail.type](event.detail.message);
    })

    window.addEventListener('show-message', event => {
        Swal.fire({
            icon: event.detail.icon,
            title: event.detail.title,
            text: event.detail.text,
            confirmButtonColor: 'var(--success)',
            confirmButtonText: 'Закрыть',
        }).then(_ => {
            if(event.detail.redirect) {
                window.location.href = event.detail.redirect;
            }
        });
    })

</script>
</body>

</html>
