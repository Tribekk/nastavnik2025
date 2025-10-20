<div class="pb-5" data-wizard-type="step-content" @if($step == "second") data-wizard-state="current" @endif>
    <p class="font-size-h5 text-dark-50 mb-5">
        На выбранное вами время найдено {{ count($consultants) }} консультант{{ num2word(count($consultants), ["", "а", "ов"]) }}
    </p>

    <div class="row justify-content-center mt-7">
        @foreach($consultants as $consultant)
            <div class="my-3 col-12 @if(!($consultant->id == $consultant_id)) cursor-pointer hover-opacity-80 @endif" wire:click.prevent="setConsultant({{$consultant->id}})">
                @include('consultant.business-card._business-card.card', ['user' => $consultant, 'selected' => $consultant->id == $consultant_id])
            </div>
        @endforeach
    </div>
</div>
