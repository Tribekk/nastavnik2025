<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectRole" @click.away="selectRole = false" wire:ignore>
    <select id="role_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click.prevent="selectRole = false" wire:click.prevent="addRole">Добавить</button>
        <button class="btn btn-secondary ml-3" @click.prevent="selectRole = false">Отмена</button>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Назначенные роли</h4>
    </div>
    <div x-show="!selectRole">
        <button class="btn btn-light-success p-3" @click.prevent="selectRole = true">
            <i class="la la-plus"></i> {{ __('Добавить') }}
        </button>
    </div>
</div>

<div class="mt-5">
    @forelse($roles as $role)
        <button wire:click.prevent="$emit('remove-role', {{ $role['id'] }})" class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i>{{ $role['title'] }}
        </button>
        <input type="text" hidden name="roles[{{ $loop->index }}][id]" value="{{ $role['id'] }}">
        <input type="text" hidden name="roles[{{ $loop->index }}][name]" value="{{ $role['name'] }}">
    @empty
        <div class="mt-5">
            <x-alert type="outline-info" text="{{ __('Пока не назначено ни одной роли') }}" :close="false"/>
        </div>
    @endforelse
</div>
