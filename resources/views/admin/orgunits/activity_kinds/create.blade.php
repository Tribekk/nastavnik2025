@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком направлений деятельности"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новое направление деятельности
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.orgunits.activity_kinds.store') }}" method="post">
                                    @csrf

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название"/>

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название"/>

                                    <x-inputs.radio-group title="Используется" name="disabled">
                                        <x-inputs.radio title="Да" name="disabled" checked value="false"/>
                                        <x-inputs.radio title="Нет" name="disabled" value="true"/>
                                    </x-inputs.radio-group>

                                    <x-inputs.submit title="Добавить"/>
                                    <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.orgunits.activity_kinds.view') }}" title="{{ __('К списку направлений деятельности') }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
