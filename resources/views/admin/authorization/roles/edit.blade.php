@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком ролей"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom w-50">
                    @include('admin.authorization.roles._update._header')
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.roles.update', $role) }}">
                            @csrf
                            @method('PATCH')

                            <x-inputs.input-text-v name="title" title="{{ __('Название') }}" :required="true" :value="$role->title"/>

                            <x-inputs.input-text-v name="name" title="{{ __('Код') }}" :required="true" :value="$role->name"/>

                            <x-inputs.select name="guard_name" title="{{ __('Контекст') }}" :values="$guards" :required="true" :currentValue="$role->guard_name"/>

                            <x-inputs.text-area name="description" title="{{__('Описание')}}" rows="5" :value="$role->description ?? ''"/>

                            <x-inputs.submit title="{{ __('Сохранить') }}"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
