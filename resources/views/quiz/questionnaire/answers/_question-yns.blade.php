<label class="radio radio-{{ $answer->color }} font-size-sm-h4 font-size-lg">
    <input
        type="radio"
        name="question_{{ $questions->firstItem() + $index }}"
        wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
        @if($answer->madeByUser(Auth::id())) checked @endif
    >
    <span></span>{{ $answer->title }}
</label>
