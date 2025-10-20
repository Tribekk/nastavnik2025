@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление описанием организации"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            {{ $orgunit->title }}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('orgunits.description.update', $orgunit) }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <x-tables.status/>

                                    <x-inputs.summernote-editor title="Карьерные программы" placeholder="Карьерные программы" name="career_program" id="career_program" value="{{ old('career_program', $orgunit->career_program) }}"/>
                                    <x-inputs.summernote-editor title="О компании" placeholder="О компании" name="about_orgunit" id="about_orgunit" value="{{ old('about_orgunit', $orgunit->about_orgunit) }}"/>
                                    <x-inputs.summernote-editor title="Контакты" placeholder="Контакты" name="contacts" id="contacts" value="{{ old('contacts', $orgunit->contacts) }}"/>

                                    <div class="d-flex">
                                        <x-inputs.submit title="Обновить"/>
                                        <x-inputs.button-link type="btn-success" link="{{ route('orgunits.edit', $orgunit) }}" title="{{ __('Редактировать организацию') }}"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.description', $orgunit) }}" title="{{ __('Просмотр лендинга') }}"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.view') }}" title="{{ __('К списку организаций') }}"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

