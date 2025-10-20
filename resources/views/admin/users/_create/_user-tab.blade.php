<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">

    <div class="py-3">
        @if ($errors->any())
            <div class="alert alert-custom alert-light-danger">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{ $errors->first() }}</div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Данные пользователя') }}</h3>
            </div>

            @include('admin.users._create._avatar')

            <x-inputs.input-text-v title="Фамилия" type="text" value="{{ old('last_name') }}" name="last_name" id="last_name" required></x-inputs.input-text-v>

            <x-inputs.input-text-v title="Имя" type="text" value="{{ old('first_name') }}" name="first_name" id="first_name" required></x-inputs.input-text-v>

            <x-inputs.input-text-v title="Отчество" type="text" value="{{ old('middle_name') }}" name="middle_name" id="middle_name"></x-inputs.input-text-v>

            <x-inputs.input-text-v title="{{ __('E-mail') }}" type="email" value="{{ old('email') }}" placeholder="Укажите адрес электронной почты" name="email" id="email" prepend-icon="la la-at" required></x-inputs.input-text-v>

            <x-inputs.input-text-v title="{{ __('Телефон') }}" type="tel" value="{{ old('phone') }}" placeholder="+7 (___) ___ __ __" name="phone" id="phone" prepend-icon="la la-phone" required></x-inputs.input-text-v>

            <x-inputs.input-text-v title="Дата рождения" placeholder="дд.мм.гггг" readonly id="birth_date" :date-picker="true" name="birth_date" value="{{ old('birth_date') }}" id="birth_date"></x-inputs.input-text-v>

            <x-inputs.radio-group title="Пол" name="sex">
                <x-inputs.radio title="Мужской" value="1" name="sex" id="sex_men" checked></x-inputs.radio>
                <x-inputs.radio title="Женский" value="2" name="sex" id="sex_women"></x-inputs.radio>
            </x-inputs.radio-group>

            <livewire:school.select-school-class :nullable-class-id="true" ></livewire:school.select-school-class>

            <div class="form-group">
                <label for="orgunit_id" class="font-size-h6 font-weight-bolder text-dark">Выберите организацию</label>
                <livewire:components.select2
                    name="orgunit_id" id="orgunit_id"
                    url="{{ route('admin.orgunits.view') }}"
                    event="setOrgunitId"
                    placeholder="{{ __('Выберите организацию') }}"
                    selected="{{ old('orgunit_id') ?? '' }}"
                    selectedItemUrl="/admin/orgunits"
                />

                @error('orgunit_id')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="pb-8 pt-lg-0 pt-8 mt-12">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Пароль от аккаунта') }}</h3>
            </div>

            <x-inputs.input-text-v title="Пароль" type="password" name="password" id="password" value="{{ old('password') }}" required></x-inputs.input-text-v>

            <x-inputs.input-text-v title="Пароль еще раз" type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required></x-inputs.input-text-v>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
@endpush
