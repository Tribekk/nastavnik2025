<div class="card-body" id="traits">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-orange rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">&laquo;Образ Я&raquo;</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-orange font-size-h5 font-hero font-weight-bold">Особенности характера</h4>
                <span class="text-dark-50 font-size-lg">Портрет личности</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="text-right">
                Чем выше показатель, тем ярче выражена черта<br>
                <b>Степень проявленности этого качества указана в процентах</b>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-12">
                            @include('quiz._percentage')
                        </div>
                    </div>
                    @foreach($characterTraitResultValues as $value)
                        <div class="row mt-8">
                            <div class="col-lg-3 col-6 order-0">
                                <h4 class="trait-font-size">
                                    @unless($value->is_higher)
                                        <a href="{{ route('quiz.trait-details', ['availableQuiz' => $traitsQuiz, 'trait' => $value->trait, 'backTo' => backResultsUrl('traits', $user->id)]) }}">
                                            <span class="font-hero-super font-alla">
                                                {{ $value->trait->lower_value }}
                                            </span>
                                        </a>
                                    @else
                                        <span class="font-grey-light">
                                            {{ $value->trait->lower_value }}
                                        </span>
                                    @endunless
                                </h4>
                            </div>
                            <div class="col-lg-6 align-self-center order-3 order-lg-2">
                                <div class="progress">
                                    @if($value->is_higher)
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"></div>
                                        <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                                    @else
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                                        <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3 col-6 order-1 order-lg-3 text-right text-lg-left">
                                <h4 class="trait-font-size">
                                    @if($value->is_higher)
                                        <a href="{{ route('quiz.trait-details', ['availableQuiz' => $traitsQuiz, 'trait' => $value->trait, 'backTo' => backResultsUrl('traits', $user->id)]) }}">
                                            <span class="font-hero-super font-orange">
                                                {{ $value->trait->higher_value }}
                                            </span>
                                        </a>
                                    @else
                                        <span class="font-grey-light">
                                            {{ $value->trait->higher_value }}
                                        </span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    @endforeach

                    <div class="row mt-15">
                        <div class="col">
                            <div>
                                <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla">{{ $characterTraitResult->reliabilityPercentage == 70 ? 'менее 70' : $characterTraitResult->reliabilityPercentage }}%</span>
                            </div>
                            <div class="font-size-lg mt-2">
                                {{ $characterTraitResult->reliabilityDescription }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .trait-font-size {
            font-size: 1rem;
        }

        @media only screen and (max-width: 800px) {
            .trait-font-size {
                font-size: 1rem;
            }
        }

        @media only screen and (max-width: 699px) {
            .trait-font-size {
                font-size: .9rem;
            }
        }

        @media only screen and (max-width: 470px) {
            .trait-font-size {
                font-size: 1rem;
            }
        }

        @media only screen and (max-width: 360px) {
            .trait-font-size {
                font-size: .9rem;
            }
        }
    </style>
@endpush
