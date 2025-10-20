<div class="d-flex align-items-center my-4 cursor-pointer hover-opacity-50"
     wire:click="answerTheQuestion({{ $question->id }}, {{ $answer->id }})">
    @if($answer->value == 1)
        <span class="font-size-sm-h4 font-size-lg d-block mx-3 text-success font-hero">Да</span>
    @endif
    <span class="rounded-pill min-w-25px min-h-25px border border-2 {{ $answer->value == 1 ? 'border-success' : 'border-silver' }} @if($answer->madeByUser(Auth::id())) {{ $answer->value == 1 ? 'bg-success' : 'bg-silver' }} @endif d-block mx-4"></span>
    @if($answer->value == 0)
        <span class="font-size-sm-h4 font-size-lg d-block mx-3 text-silver font-hero">Нет</span>
    @endif
</div>

@push('css')
    <style>
        .bg-silver {
            background: #c6c6c7!important;
        }

        .border-silver {
            border-color: #c6c6c7!important;
        }

        .text-silver {
            color: #8e8e92 !important;
        }
    </style>
@endpush
