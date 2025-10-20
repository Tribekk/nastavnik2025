<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">

    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-end">

        <div class="text-dark order-2 order-md-1">
            <span class="font-weight-bold mr-2">{{ date('Y') }} ©</span>
{{--            TODO href --}}
            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">
                ПРОФТРЕКЕР
            </a>
        </div>

        <div class="nav nav-dark">
            <a href="{{ url('политика_конфиденциальности.pdf') }}" target="_blank" class="nav-link pl-0 pr-5">Политика конфиденциальности</a>
        </div>

    </div>

    @if(env('APP_ENV') == 'local' || env('APP_ENV') == 'testing')
        <div class="container-fluid d-flex align-items-center justify-content-end pt-2">
            {{ shell_exec("git log -1 --pretty=format:'%h - (%ci)'")  }}
        </div>
    @endif

    <div class="container-fluid d-lg-flex align-items-center justify-content-end pt-2 d-none">
        {{--Сделано в&nbsp;<a href="http://tandemservice.ru/" class="">TANDEM</a>--}}
    </div>
</div>
