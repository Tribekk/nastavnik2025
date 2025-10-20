<div class="card-header flex-wrap border-0 pt-6 pb-0">
    <h3 class="card-title align-items-start flex-column">
        <span class="card-label font-weight-bolder text-dark">
            {{ __('Настройка разрешений для роли') }} <span class="text-primary font-weight-boldest">{{ $role->title }}</span>
        </span>
    </h3>

    <div class="card-toolbar">
        <x-inputs.button-link link="{{ route('admin.roles.view') }}" title="{{ __('К списку ролей') }}"/>
    </div>
</div>
