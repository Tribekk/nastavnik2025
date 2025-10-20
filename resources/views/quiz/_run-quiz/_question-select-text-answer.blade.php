<div wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
     class="my-2 cursor-pointer d-flex w-100 hover-text-alla hover-opacity-90 @if($answer->madeByUser(Auth::id())) font-alla @else text-dark-65 @endif font-size-sm-h4 font-size-h5 font-weight-bold">
    {{ $answer->title }}
</div>
