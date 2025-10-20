<div class="tab-pane active show px-7" id="school-tab" role="tabpanel">
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin.schools.update', $school) }}" method="post">
                @csrf
                @method('PATCH')

                <x-inputs.input-text-v name="title" :required="true" title="Полное название" value="{{ old('title', $school->title) }}"/>

                <x-inputs.input-text-v name="short_title" :required="true" title="Сокращенное название" value="{{ old('short_title', $school->short_title) }}"/>

                <x-inputs.input-text-v name="address" title="Адрес" value="{{ old('address', $school->address) }}"/>

                    <livewire:components.select2
                                id="local"
                                name="local"
                                required="true"
                                url="{{ route('kladr.cities') }}"
                                event="filterByParent"
                                placeholder="Город "
                                selected="{{ old('kladr', $school->local) }}"
                                selectedItemUrl="/kladr/cities"


                                />



                <x-inputs.input-text-v name="number" :required="true" title="Основание взаимодействия /  Номер договора" value="{{ old('number', $school->number) }}"/>

                <x-inputs.input-text-v name="director" title="ФИО директора" value="{{ old('director', $school->director) }}"/>

                <x-inputs.input-text-v name="phone" id="phone" title="Контактный номер" prepend-icon="la la-phone" value="{{ old('phone', $school->phone) }}" placeholder="+7 (___) ___ __ __"/>

                <x-inputs.input-text-v name="email" title="Электронная почта" prepend-icon="la la-at" value="{{ old('email', $school->email) }}"/>

                <div class="form-group">
                    <label for="type_of_educational_organization" class="font-size-h6 font-weight-bolder text-dark required">Отрасль деятельности компании</label>
                    <livewire:components.select2
                        name="type_of_educational_organization_id" id="type_of_educational_organization"
                        url="{{ route('admin.types_of_educational_organization.view') }}"
                        event="setTypeEducationalOrganization"
                        placeholder="{{ __('Укажите отрасль деятельности компании') }}"
                        selected="{{ old('type_of_educational_organization_id', $school->type_of_educational_organization_id) }}"
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
                        selected="{{ old('loyalty_level_id', $school->loyalty_level_id) }}"
                        selectedItemUrl="/admin/loyalty_levels"
                    />

                    @error('loyalty_level_id')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <x-inputs.input-text-v name="token" title="Ключ регистрации" prepend-icon="la la-key" value="{{ $school->token }}" readonly/>

                <div class="d-flex">
                    <x-inputs.submit title="Обновить"/>
                    <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.schools.view') }}" title="{{ __('К списку компаний') }}"/>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            $("#phone").inputmask("+7 (999) 999 99 99");
        });
    </script>
@endpush
