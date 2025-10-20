<div>
    @if($availableQuiz->quiz->isSuitableProfessions())
        <livewire:quiz.suitable-professions :availableQuiz="$availableQuiz"/>
    @else
        @foreach($questions as $index => $question)
            @if($question->isRequiredQuestion(Auth::id()))
                @if($question->section_title)
                    <div class="mt-15 mb-12 px-3">
                        <h2 class="font-size-h1 font-weight-bold font-blue mb-2">{{ $question->section_title }}</h2>
                        @if($question->section_caption)
                            <p class="font-size-h5 text-dark-50">{{ $question->section_caption }}</p>
                        @endif
                    </div>
                @endif

                <div class="w-100 border shadow-sm mb-10 font-size-h3 p-2 p-md-10 ">
                    <div class="mb-5">
                        <span class="{{ $question->required ? 'required' : '' }}">{{ $questions->firstItem() + $index }}. {!! $question->content !!}</span>

                        @if($question->description)
                            <p class="text-dark-50 small font-size-h4">{!! $question->description !!}</p>
                        @endif

                        @if($question->min_answers > 1)
                            @php
                                $count = $question->max_answers - $question->userAnswers(Auth::user())->count();
                            @endphp

                            @if($count > 0)
                                <p class="mb-3 font-alla font-size-h6">Осталось выбрать {{ $count }} вариант(а,ов)</p>
                            @endif
                        @endif

                        @if($question->image_path)
                            <div class="max-h-200px max-w-275px max-h-md-350px mt-4 mb-5 max-w-md-400px">
                                <img src="{{ $question->image_path }}" alt="" class="img-fluid" style="max-height: -webkit-fill-available;">
                            </div>
                        @endif
                    </div>
                    <div class="">
                        <div class="form-group">
                            @if($question->type->code == 'text')
                                @include("quiz._run-quiz._question-text")
                            @elseif($question->type->code == 'select_city')
                                @include("quiz._run-quiz._question-select_city")
                            @elseif($question->type->code == 'select')
                                @include("quiz._run-quiz._question-select")
                            @elseif($question->type->code == 'image')
                                @include("quiz._run-quiz._question-image")
                            @elseif($question->type->code == 'checkbox')
                                @include("quiz._run-quiz._question-checkbox")
                            @elseif($question->type->code == 'radio')
                                @include("quiz._run-quiz._question-radio")
                            @else
                                <div class="flex-wrap radio-inline">
                                    @foreach($question->answers as $answer)

                                        @if($question->type->code == 'yns')
                                            @include("quiz._run-quiz._question-yns")
                                        @elseif($question->type->code == 'circle')
                                            @include("quiz._run-quiz._question-circle")
                                        @elseif($question->type->code == 'abv')
                                            @include("quiz._run-quiz._question-abv")
                                        @elseif($question->type->code == 'btn-outline')
                                            @include("quiz._run-quiz._question-btn-outline")
                                        @elseif($question->type->code == 'yn')
                                            @include("quiz._run-quiz._question-yn")
                                        @elseif($question->type->code == 'select_text_answer')
                                            @include("quiz._run-quiz._question-select-text-answer")
                                        @endif

                                    @endforeach
                                </div>
                            @endif

                            @if($question->arbitraryAnswer)
                                @include('quiz._run-quiz._arbitrary-answer')
                            @endif
                        </div>
                    </div>

                    @if($message = $this->questionError($index))
                        <div class="mt-4 font-size-lg">
                            <x-alert type="danger" text="{{ $message }}"></x-alert>
                        </div>
                    @endif
                </div>
            @endif
        @endforeach

        <div class="mt-10 d-flex flex-column flex-md-row justify-content-between">
            <div>
                {{ $questions->links() }}
            </div>

            @if(env('APP_ENV', 'production') !== 'production')
                <div class="mt-3 mt-md-0">
                    <button class="btn btn-secondary font-size-h5" wire:click="generateAnswers">
                        <i class="la la-dice-d6"></i>
                        Сгенерировать
                    </button>
                </div>
            @endif

            @if(($availableQuiz->quiz->slug != "interests" && $availableQuiz->canAnsweredAllQuestions()) || !$questions->hasMorePages())
                <div class="mt-3 mt-md-0">
                    <button class="btn btn-success font-size-h5" wire:click="finishQuiz"><i class="la la-check"></i>
                        Завершить
                    </button>
                </div>
            @endif
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            window.livewire.on('showQuestionErrors', errors => {
                let message = "";
                errors.forEach(error => {
                    const perPage = {{ $questions->perPage() }};

                    let page = 1;
                    for(let i = 0; i < error.question_index; i++) {
                        if((i+1) % perPage === 0) page++;
                    }

                    message += `<a href="{{ route('quiz.show', ['availableQuiz' => $this->availableQuizId]) }}?page=${page}" class="my-3 fit text-left d-block cursor-pointer text-danger hover-opacity-50 font-weight-bold">${error.message}</a>`
                })

                Swal.fire({
                    title: '<h2 class="text-primary font-size-h2 font-weight-bold">Не удалось завершить!</h2>',
                    html: message,
                    width: 600,
                    confirmButtonColor: 'var(--success)',
                    confirmButtonText: 'Закрыть',

                });
            });
        });
    </script>
@endpush
