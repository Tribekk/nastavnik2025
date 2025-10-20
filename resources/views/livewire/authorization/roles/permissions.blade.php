@section('subheader')
    <x-subheader title="Управление разрешениями роли"/>
@endsection

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-custom">
                @include('admin.authorization.roles._permissions._header')
                <div class="card-body">
                    @forelse($permissions as $permission)
                        <div class="form-group row">
                            <label class="col-8 col-lg-3 col-form-label">{{ $permission->title }}</label>
                            <div class="col-4 col-lg-3">
                                <span class="switch switch-icon">
                                    <label>
                                        <input type="checkbox" @if($role->hasPermissionTo($permission->name)) checked="checked" @endif name="select" wire:click="toggleRolePermission('{{ $role->id }}','{{ $permission->name }}')">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    @empty
                        <x-alert text="{{__('Подходящих разрешений не найдено')}}"></x-alert>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
