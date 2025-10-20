<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectCurator" @click.away="selectCurator = false" wire:ignore>
    <select id="curator_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click="selectCurator = false" wire:click="addCurator">Добавить</button>
        <button class="btn btn-secondary ml-3" @click="selectCurator = false">Отмена</button>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Назначенные руководители структурного подразделения</h4>
    </div>
    <div x-show="!selectCurator">
        <button class="btn btn-light-success p-3" @click="selectCurator = true">
            <i class="la la-plus"></i> {{ __('Добавить') }}
        </button>
    </div>
</div>

<div class="mt-5">
    @php
    @endphp
    @forelse($curators as $curator)
        <button wire:click="$emit('remove-curator', {{ $curator['id'] }})"  class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i>{{ $curator->user->fullName }}
        </button>
    @empty
        <div class="mt-5">
            <x-alert type="outline-info" text="{{ __('Пока не назначено ни одного руководителя') }}" :close="false"/>
        </div>
    @endforelse
</div>
