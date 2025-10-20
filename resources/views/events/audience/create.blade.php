@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком аудитории"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новая аудитория
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('employer.events.audience.store') }}" method="post">
                                    @csrf

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название"/>

                                    <x-inputs.submit title="Добавить"/>

                                    <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.audience.view') }}" title="{{ __('К списку аудиторий') }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
