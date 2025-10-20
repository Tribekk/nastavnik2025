<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

@if(!isset($disablePreviousLink))
    <div>
        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и тестов</a>
    </div>
@endif

@foreach($resultValues as $value)
    <div class="row mt-12">
        <div class="col-lg-3 col-6 order-0">
            <h4 class="trait-font-size">
                @unless($value->is_higher)
                    <a href="{{ route('quiz.trait-details', [
                            'availableQuiz' => $availableQuiz,
                            'trait' => $value->trait,
                            'backTo' => $backTo ?? false,
                        ]) }}">
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
                    <div class="progress-bar {{ $wrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                @else
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                    <div class="progress-bar {{ $wrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"></div>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-6 order-1 order-lg-3 text-right">
            <h4 class="trait-font-size">
                @if($value->is_higher)
                    <a href="{{ route('quiz.trait-details', ['availableQuiz' => $availableQuiz, 'trait' => $value->trait, 'backTo' => $backTo ?? false,]) }}">
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

@include('quiz._percentage')

<div class="row mt-10 px-1 px-md-15">
    <div class="col">
        <div>
            <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla">{{ $result->reliabilityPercentage == 70 ? 'менее 70' : $result->reliabilityPercentage }}%</span>
        </div>
        <div class="font-size-lg mt-2">
            {{ $result->reliabilityDescription }}
        </div>
    </div>
</div>

@push('css')
    <style>
        .trait-font-size {
            font-size: 1.25rem;
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
