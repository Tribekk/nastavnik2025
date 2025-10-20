@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком ролей"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom col-lg-6 col-12 px-0">
                    @include('admin.authorization.roles._create._header')
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <x-inputs.input-text-v name="title" title="{{ __('Название') }}" :required="true"/>

                            <x-inputs.input-text-v name="name" title="{{ __('Код') }}" :required="true"/>

                            <x-inputs.select name="guard_name" title="{{ __('Контекст') }}" :values="$guards" :required="true"/>

                            <x-inputs.text-area name="description" title="{{__('Описание')}}" rows="5"/>

                            <x-inputs.submit title="{{ __('Создать') }}"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
