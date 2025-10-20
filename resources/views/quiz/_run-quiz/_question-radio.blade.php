@php
    $colMd = "col-md-";
    $answersCount = $question->answers()->count();
    if($answersCount > 2) {
        if($answersCount % 3 == 0) $colMd .= "4";
        else if($answersCount % 4 == 0) $colMd .= "3";
        else $colMd .= "4";
    } else $colMd .= "12";

    $inline = false;
    $inlineQuestions = [
        "Какова вероятность, что ты останешься строить карьеру (любую) в родном городе",
        "Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе",
        "Оцените общий уровень благополучия Вашей семьи",
        "Ваш общий трудовой стаж?",
        "Какой секцией занимаешься самое продолжительное время - укажи сколько лет",
        "Какой у тебя средний балл?",
    ];

    if(in_array($question->content, $inlineQuestions)) {
        $inline = true;
    }

    if($answersCount <=2) {
        $inline = true;
    }


@endphp

<div class="{{ $inline ? 'radio-inline' : 'row' }} flex-wrap">
    @foreach($question->answers as $answer)

        @if(!$inline)
            <div class="{{ $colMd }} my-2">
        @endif
            <label class="radio radio-blue font-size-sm-h4 font-size-lg {{ $inline ? 'my-2' : '' }} d-flex align-items-start align-content-start">
                <input
                    type="radio"
                    name="question_{{ $questions->firstItem() + $index }}"
                    wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
                    @if($answer->madeByUser(Auth::id())) checked @endif
                >
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>{{ $answer->title }}
            </label>
        @if(!$inline)
            </div>
        @endif

    @endforeach
</div>
