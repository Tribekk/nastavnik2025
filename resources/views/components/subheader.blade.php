<div class="subheader py-2 py-lg-6 subheader-solid  d-md-block">
{{--    <div class="subheader py-2 py-lg-6 subheader-solid @if($withProgress) bg-point @endif d-md-block">--}}
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap subhead__progress-container">

        @if($title)
            <div class="wrap-logo d-inline-flex align-content-center mr-5">
                <div class="mainLogo">
                    <img src="../../img/bootLogo1.png" alt="">
                </div>
                <div class="mainLogo">
                    <img src="../../img/bootLogo2.png" alt="">
                </div>
                <div class="mainLogo">
                    <img src="../../img/bootLogo3.png" alt="">
                </div>
{{--                <img src="{{ asset('img/subheader.svg') }}" class="subhead__progress-background">--}}
            </div>
            <div class="font-pixel font-brown-light font-weight-black font-size-h1 bg-white @unless($withProgress) flex-grow-1 @endunless">
               <a href="/" style="color: #2d38fc;text-transform: uppercase;font-weight: normal;font-size: 25px;"> <img src="https://lk.proftreker.ru/img/blueLogo.png" class="max-h-40px" alt=""> Наставничество</a>
            </div>
        @endif

        @if($withProgress)
                <div class="wrap-logo d-inline-flex align-content-center">
                    <div class="mainLogo">
                        <img src="../../img/bootLogo1.png" alt="">
                    </div>
                    <div class="mainLogo">
                        <img src="../../img/bootLogo2.png" alt="">
                    </div>
                    <div class="mainLogo">
                        <img src="../../img/bootLogo3.png" alt="">
                    </div>
                    {{--                <img src="{{ asset('img/subheader.svg') }}" class="subhead__progress-background">--}}
                </div>
{{--            <div>--}}
{{--                <img src="{{ asset('img/rocket.png') }}" class="img-fluid subhead__progress-rocket"/>--}}
{{--            </div>--}}
{{--            <div class="bg-white">--}}
{{--                <img src="{{ asset('img/lamp.png') }}" class="img-fluid subhead__progress-lamp"/>--}}
{{--            </div>--}}
        @endif
    </div>
</div>

@push('css')
    <style>
        .topbar-mobile-on .topbar {
            z-index: 2;
        }

        .subhead__progress-container {
            position: relative;
        }

        .subhead__progress-background {
            height: 35px;
        }

        .subhead__progress-rocket {
            height: 40px;
            position: absolute;
            z-index: 1;
            left: calc({{ $margin }}% - 35px);
            top: 50%;
            transform: translate(calc(-{{ $margin }}% - 35px), -50%);
        }

        .subhead__progress-lamp {
            height: 60px;
        }

        @media only screen and (max-width: 768px) {
            .subhead__progress-background {
                height: 35px;
            }

            .subhead__progress-rocket {
                height: 25px;
                left: calc({{ $margin }}% - 23px);
                transform: translate(calc(-{{ $margin }}% - 23px), -50%);
            }

            .subhead__progress-lamp {
                height: 40px;
            }
        }
    </style>
@endpush
