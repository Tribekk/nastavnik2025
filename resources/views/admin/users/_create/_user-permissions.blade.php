<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Разрешения, выданные напрямую</h4>
    </div>
    <div x-show="!selectPermission">
        <button class="btn btn-light-success p-3" @click.prevent="selectPermission = true">
            <i class="la la-plus"></i> {{ __('Добавить') }}
        </button>
    </div>
</div>

<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectPermission" @click.away="selectPermission = false" wire:ignore>
    <select id="permission_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click.prevent="selectPermission = false" wire:click.prevent="addPermission">Добавить</button>
        <button class="btn btn-secondary ml-3" @click.prevent="selectPermission = false">Отмена</button>
    </div>
</div>

<div class="mt-5">
    @forelse($permissions as $permission)
        <button wire:click.prevent="$emit('revoke-permission', {{ $permission['id'] }})" class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i>{{ $permission['title'] }}
            <input type="text" hidden name="permissions[{{ $loop->index }}][id]" value="{{ $permission['id'] }}">
            <input type="text" hidden name="permissions[{{ $loop->index }}][title]" value="{{ $permission['title'] }}">
        </button>
    @empty
        <div class="mt-5">
            <x-alert text="{{ __('Пока не выдано ни одного разрешения') }}" type="outline-info" :close="false"/>
        </div>
    @endforelse
</div>
