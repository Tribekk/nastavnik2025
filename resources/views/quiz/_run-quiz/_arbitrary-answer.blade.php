<div class="form-group mt-8">
    <label for="question_{{ $questions->firstItem() + $index }}">Другое</label>
    <input type="{{ $question->arbitraryAnswer->type }}"
           class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
           name="question_{{ $questions->firstItem() + $index }}"
           id="question_{{ $questions->firstItem() + $index }}"
           wire:change.prevent="answerTheQuestion({{ $question->id }}, {{ $question->arbitraryAnswer->id }}, $event.target.value)"
           value="{{ optional($question->arbitraryAnswer->user(Auth::id()))->value ?? "" }}"
           maxlength="191"
           placeholder="Ответ">
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            @this.on('clearAnswer{{ $question->id }}.{{ $question->arbitraryAnswer->id }}', _ => {
                 $("#question_{{ $questions->firstItem() + $index }}").val("");
            });
        });
    </script>
@endpush
