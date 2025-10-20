<select class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
        wire:change="answerTheQuestionSelect({{ $question->id }}, $event.target.value)"
        name="question_{{ $questions->firstItem() + $index }}"
        id="question_{{ $questions->firstItem() + $index }}">

    <option @if(!$question->answeredByUser(Auth::id())) selected @endif disabled>Не выбрано</option>
    @foreach($question->answers as $answer)
        <option value="{{ $answer->value ?? $answer->title }}" @if($answer->madeByUser(Auth::id())) selected @endif>{{ $answer->title }}</option>
    @endforeach
</select>
