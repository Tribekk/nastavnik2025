<div
    class="@if($answer->madeByUser(Auth::id())) selected @endif answer-circle justify-content-center my-4 rounded-circle w-200px h-200px mr-5 font-size-base d-flex align-items-center text-center p-1"
    wire:click.prevent="toggleInterest({{ $question->id }}, {{ $answer->id }})"
>
    {{ $answer->title }}
</div>
