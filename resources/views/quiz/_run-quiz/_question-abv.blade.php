@php

if (($availableQuiz->quiz->id === 8 || $availableQuiz->quiz->id === 13) && $answer->madeByUser(Auth::id()) ){
   $button = 'btn-info';
}elseif ($availableQuiz->quiz->id === 3  && $answer->madeByUser(Auth::id())){
  $button = 'btn-green';
}elseif ($answer->madeByUser(Auth::id())){
    $button = 'btn-success';
}

if (($availableQuiz->quiz->id === 8 || $availableQuiz->quiz->id === 13) && !$answer->madeByUser(Auth::id()) ){
   $button = 'btn-outline-info';
}elseif ($availableQuiz->quiz->id === 3  && !$answer->madeByUser(Auth::id())){
  $button = 'border-green';
}elseif (!$answer->madeByUser(Auth::id())){
    $button = 'btn-outline-success';
}

@endphp

<div wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
     class="rounded-pill py-4 px-md-10 w-100 text-md-left text-center m-3 cursor-pointer btn {{$button}} font-size-sm-h4 font-size-lg">
    {{ $answer->title }}
</div>
