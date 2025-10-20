@if((!isset($pages) || !$pages))
    <div class="container">
@endif
    <div class="row">
        <div class="col-lg-12">
            @php
                $sectionClasses = (isset($pages) && $pages) ?
                    "rounded-0 min-vh-100" :
                    "gutter-b";

                function backResultsUrl($sectionId, $userId = null) {
                    if(\Illuminate\Support\Facades\Route::is('quiz.user_results') && $userId) {
                        return route('quiz.user_results', $userId)."?backTo=".request('backTo', false)."#{$sectionId}";
                    }

                    return route('quiz.results')."#{$sectionId}";
                }
            @endphp
            <div class="card card-custom w-100 {{ $sectionClasses }}">
                <img class="bgImg img-cover" src="{{ asset('img/bootBg.png') }}" alt="">
                @include('quiz._results.home-screen')
            </div>

            <div class="card card-custom {{ $sectionClasses }}">
                @include("quiz._results.test-screen-type-of-thinking", ['user' => $user])
            </div>
            <div class="page-break"></div>

            <div class="card card-custom {{ $sectionClasses }}">
                @include("quiz._results.questionnaire-compare")
            </div>

            @if($depthTestsFinished)
                <div class="card card-custom {{ $sectionClasses }}">
                    @include("quiz._results.test-screen-inclinations", ['user' => $user])
                </div>
                <div class="page-break"></div>

                <div class="card card-custom {{ $sectionClasses }}">
                    @include("quiz._results.test-screen-intelligence-level", ['user' => $user])
                </div>
                <div class="page-break"></div>


                <div class="page-break"></div>

                <div class="card card-custom {{ $sectionClasses }}">
                    @include("quiz._results.test-screen-solution-of-cases", ['user' => $user])
                </div>
                <div class="page-break"></div>

                <div class="card card-custom {{ $sectionClasses }}">
                    @include("quiz._results.questionnaire-compare")
                </div>
                <div class="page-break"></div>
            @elseif($user->hasDepthTests() && !(isset($pages) && $pages))
                <div class="card gutter-b">
                    <div class="card-body">
                        <div class="container">
                            <x-alert type="light-info" text="Для того чтобы просмотреть отчет по углубленному тестированию необходимо завершить углубленное тестирование." :close="false"></x-alert>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card card-custom {{ $sectionClasses }}">
                @include("quiz._results.end-screen")
            </div>
        </div>
    </div>

@if((!isset($pages) || !$pages))
    </div>
@endif

@push('css')
    <style>
        .page-break {
            page-break-after: always;
        }

        @if(isset($pages) && $pages)
            body {
                background: #fff!important;
            }

            a, a:hover {
                text-decoration: none!important;
            }
        @endif
    </style>
@endpush
