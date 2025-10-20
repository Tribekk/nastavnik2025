<div class="mr-5 mb-5 order rounded shadow-sm p-10 w-100 md-w-50" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <h4 class="font-size-h3 font-hero-super mb-5">
                @if(($availableQuiz->quiz->isSuitableProfessions() && $availableQuiz->interestsQuizFinished() || !$availableQuiz->quiz->isSuitableProfessions()) && $availableQuiz->state->fillable())
                        <a class="link"
                            @if($availableQuiz->state->initial())
                            href="{{ route('quiz.description', $availableQuiz) }}"
                            @else
                            href="{{ route('quiz.show', $availableQuiz) }}"
                            @endif
                        >
                @endif
                    {{ $availableQuiz->quiz->title }}
                @if(($availableQuiz->quiz->isSuitableProfessions() && $availableQuiz->interestsQuizFinished() || !$availableQuiz->quiz->isSuitableProfessions()) && $availableQuiz->state->fillable())
                    </a>
                @endif
            </h4>
            @if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished())
                <div class="my-3">
                    <span class="text-primary">Для прохождения этого теста необходимо пройти тест «Интересы»</span>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <span class="text-muted"><i class="la la-clock"></i> {{ $availableQuiz->quiz->minutes }} минут</span>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <div class="text-dark-50 font-size-lg font-hero mb-3">
                {{ $availableQuiz->quiz->questionCount }} вопросов
            </div>
            @if($availableQuiz->state->fillable())
                <span class="text-dark-50 font-size-lg">
                    {{ $availableQuiz->state->title() }}
                </span>
            @else
                <i class="la la-refresh"></i>
                <a href="#" class="link font-size-h3" wire:click.prevent="openQuiz">
                    Пройти снова
                </a>
            @endif
        </div>
        <div class="d-flex flex-column justify-content-around col-md-6">
            @if($availableQuiz->state->fillable())
                <div class="text-dark-50 font-size-lg font-hero mb-3">
                    Заполнено на {{ $availableQuiz->quiz->filledPercentage(Auth::user()) }}%
                </div>
            @else
                <div class="text-dark-50 font-size-lg font-hero mb-3 min-w-md-150px text-center">
                    {{ $availableQuiz->state->title() }}<br/>
                    <small class="text-muted">{{ $availableQuiz->finished_at->format('d.m.Y') }}</small>
                </div>
            @endif

            @if($availableQuiz->canBeFinished() && $availableQuiz->state->fillable())
                <button class="btn btn-success btn-sm w-100" wire:click="finishQuiz">
                    Завершить
                </button>
            @endif

            @unless($availableQuiz->state->fillable())
                <a href="{{ route('quiz.result', $availableQuiz) }}" role="button" class="btn btn-sm btn-success">
                    Результаты
                </a>
            @endunless

        </div>
    </div>
</div>
