<input type="{{ $question->answers[0]->type }}"
       class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
       name="question_{{ $questions->firstItem() + $index }}"
       id="question_{{ $questions->firstItem() + $index }}"
       value="{{ optional($question->answers[0]->user(Auth::id()))->value ?? "" }}"
       maxlength="191"
       @if($question->answers[0]->type == "date")
           readonly
        @else
       wire:change="answerTheQuestion({{ $question->id }}, {{ $question->answers[0]->id }}, $event.target.value)"
       @endif

       placeholder="{{ $question->answers[0]->title ?? 'Ответ' }}">

@push('scripts')
    <script>
        @if($question->answers[0]->type == "date")
            $(document).ready(function() {
                var arrows;
                if (KTUtil.isRTL()) {
                    arrows = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                } else {
                    arrows = {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }

                // minimum setup
                $('#question_{{ $questions->firstItem() + $index }}').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(e) {
                    @this.call('answerTheQuestion',
                        {{ $question->id }},
                        {{ $question->answers[0]->id }},
                        e.target.value
                    );

                    $('#question_{{ $questions->firstItem() + $index }}').datepicker('hide');
                });
            });
        @endif
    </script>
@endpush
