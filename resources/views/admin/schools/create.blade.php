@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком компаний"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новая компания
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.schools.store') }}" method="post">
                                    @csrf

                                    <x-inputs.input-text-v name="title" :required="true" title="Полное название"/>

                                    <x-inputs.input-text-v name="short_title" :required="true" title="Сокращенное название"/>

                                <div class="form-group">

                                <label for="type_of_educational_organization" class="font-size-h6 font-weight-bolder text-dark required">Локация</label>



                                <livewire:components.select2
                                id="local"
                                name="local"
                                required="true"
                                url="{{ route('kladr.cities') }}"
                                event="filterByParent"
                                placeholder="Город "
                                selected="{{ old('kladr') }}"
                                selectedItemUrl="/kladr/cities"


                                />

                                </div>

                                    <x-inputs.input-text-v name="address" title="Улица, дом" placeholder="Улица, дом"/>

                                    <x-inputs.input-text-v name="number" :required="true" title="Основание взаимодействия /  Номер договора"/>

                                    <x-inputs.input-text-v name="director" title="ФИО директора"/>

                                    <x-inputs.input-text-v name="phone" id="phone" title="Контактный номер" prepend-icon="la la-phone" placeholder="+7 (___) ___ __ __"/>

                                    <x-inputs.input-text-v name="email" title="Электронная почта" prepend-icon="la la-at"/>

                                    <div class="form-group">
                                        <label for="type_of_educational_organization" class="font-size-h6 font-weight-bolder text-dark required">Отрасль деятельности компании</label>
                                        <livewire:components.select2
                                            name="type_of_educational_organization_id" id="type_of_educational_organization"
                                            url="{{ route('admin.types_of_educational_organization.view') }}"
                                            event="setTypeEducationalOrganization"
                                            placeholder="{{ __('Укажите отрасль деятельности компании') }}"
                                            selected="{{ old('type_of_educational_organization_id') }}"
                                            selectedItemUrl="/admin/types_of_educational_organization"
                                        />

                                        @error('type_of_educational_organization_id')
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="loyalty_level" class="font-size-h6 font-weight-bolder text-dark">Уровень лояльности</label>
                                        <livewire:components.select2
                                            name="loyalty_level_id" id="loyalty_level"
                                            url="{{ route('admin.loyalty_levels.view') }}"
                                            event="setLoyaltyLevel"
                                            placeholder="{{ __('Укажите уровень лояльности компании') }}"
                                            selected="{{ old('loyalty_level_id') }}"
                                            selectedItemUrl="/admin/loyalty_levels"
                                        />

                                        @error('loyalty_level_id')
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <x-inputs.input-text-v name="token" title="Ключ регистрации" prepend-icon="la la-key" value="{{ old('token', \Domain\Admin\Models\School::generateToken()) }}" readonly/>

                                    <x-inputs.submit title="Добавить"/>

                                    <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.schools.view') }}" title="{{ __('К списку компаний') }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
@endpush
