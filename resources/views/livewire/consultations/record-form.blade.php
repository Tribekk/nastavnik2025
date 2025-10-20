<div class="wizard wizard-1"
     @if($step == "first" || $step == "last")
        data-wizard-state="{{ $step == 'first' ? 'first' : 'last' }}"
     @else
        data-wizard-state="between"
     @endif
     data-wizard-clickable="false">

    @include('consultations._record-form.head-stepper')

    <div class="row justify-content-center my-10 my-lg-15">
        <div class="col-xl-12 col-xxl-7">
            <form class="form"
                  action="#"
                  method="post">
                @csrf

                @if($errors->any())
                    <div class="mb-12">
                        <x-alert type="danger" text="{{ $errors->first() }}" :close="false"/>
                    </div>
                @endif

                @include('consultations._record-form.first-step')
                @include('consultations._record-form.second-step')
                @include('consultations._record-form.last-step')

                <div class="button-group border-top mt-5 pt-10">
                    <button type="button" class="btn btn-outline-primary" wire:click="changeStep(false)" data-wizard-type="action-prev">Назад</button>
                    <button type="button" class="btn btn-primary" data-wizard-type="action-submit" wire:click="storeRecord">Подтвердить</button>
                    <button type="button" class="btn @if($this->canGoNextStep()) btn-primary @else btn-secondary @endif" @if(!$this->canGoNextStep()) style="pointer-events: none;" @endif wire:click="changeStep(true)" data-wizard-type="action-next">Продолжить</button>
                </div>
             </form>
        </div>
    </div>
</div>

@push('css')
    <link rel="stylesheet" href="{{ asset('css/pages/wizard/wizard-1.css') }}">
@endpush
