<form class="form" method="POST" action="{{ route('attach.teacher') }}">
    @csrf

    @if(session()->has('errors'))
        <x-alert type="danger" text="{{ session('errors')->first() }}"></x-alert>
    @endif

    <div class="form-group">
        <label for="token" class="text-dark font-size-h4 required">Уважаемый куратор от компании,
            чтобы попасть в Ваш личный кабинет, просим ввести код доступа:</label>
        <x-inputs.input-text-v name="token" id="token" placeholder="xxxx-xxxx"></x-inputs.input-text-v>
    </div>

    <div class="form-group">
        <label for="token" class="text-dark font-size-h4 required">Выберете Вашу организацию:</label>
        <livewire:components.select2
            name="school_id" id="school"
            url="{{ route('admin.schools.view') }}"
            event="setSchool"
            placeholder="{{__('Укажите организацию')}}"
            selected="{{ old('school_id') }}"
            selectedItemUrl="/admin/schools"
        />
        @error('school_id')
        <span class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="position" class="text-dark text-md-right font-size-h4 required">Ваша должность:</label>
        <x-inputs.input-text-v name="position" id="position" placeholder="Укажите вашу должность"></x-inputs.input-text-v>
    </div>

    <livewire:user.attach.select-teacher-type role="{{ old('role', 'teacher') }}"></livewire:user.attach.select-teacher-type>


    <p class="pt-5 text-dark font-size-h4">Нажмите кнопку сохранить и Вы попадете в свой личный кабинет,
        где сможете видеть уже созданные структурные подразделения,
        либо добавлять  новые, назначать других кураторов,
        отслеживать процесс регистрации и анкетирования наставников.</p>

    <div class="pb-lg-0 pb-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Назад') }}
        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Сохранить') }}
{{--            <span class="d-block font-weight-normal">{{ __('Данные компании и структурных подразделений') }}</span>--}}
        </button>
    </div>

</form>
