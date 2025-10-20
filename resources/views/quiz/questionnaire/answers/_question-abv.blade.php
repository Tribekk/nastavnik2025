<div wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})"
     class="rounded-pill py-4 px-10 w-100 text-md-left text-center m-3 cursor-pointer btn @if($answer->madeByUser(Auth::id())) btn-success @else btn-outline-success @endif font-size-sm-h4 font-size-lg">
    {{ $answer->title }}
</div>
