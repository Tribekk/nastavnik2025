<div class="row">
    @php
        $colMd = "col-md-";
        $answersCount = $question->answers()->count();
        if($answersCount > 2) {
            if($answersCount % 3 == 0) $colMd .= "4";
            else if($answersCount % 4 == 0) $colMd .= "3";
            else $colMd .= "4";
        } else $colMd .= "12";
    @endphp

    @foreach($question->answers as $answer)
        <div class="{{ $colMd }} my-2">
            <label class="checkbox font-size-sm-h4 checkbox-blue font-size-lg d-flex align-items-start align-content-start">
                <input
                    type="checkbox"
                    name="question_{{ $questions->firstItem() + $index }}"
                    wire:click.prevent="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
                    @if($answer->madeByUser(Auth::id())) checked @endif
                >
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>{{ $answer->title }}
            </label>
        </div>
    @endforeach
</div>
