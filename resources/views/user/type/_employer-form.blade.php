<form class="form" method="POST" action="{{ route('attach.employer') }}">
    @csrf

    @if(session()->has('errors'))
        <x-alert type="danger" text="{{ session('errors')->first() }}"></x-alert>
    @endif

    <div class="form-group">
        <label for="orgunit_id" class="text-dark font-size-h4 required">Выберите Вашу организацию:</label>
        <livewire:components.select2
            name="orgunit_id"
            id="orgunit_id"
            url="{{ route('orgunits.view') }}"
            event="setOrgunit"
            placeholder="Организация"
            selected="{{ old('orgunit_id') ?? '' }}"
            selectedItemUrl="/orgunits"
        ></livewire:components.select2>
    </div>


    <div class="form-group">
        <label for="email" class="text-dark font-size-h4 required">Адрес электронной почты:</label>
        <x-inputs.input-text-v type="email" name="email" id="email"></x-inputs.input-text-v>
    </div>

    <div class="form-group">
        <label for="position" class="text-dark font-size-h4 required">Ваша должность:</label>
        <x-inputs.input-text-v name="position" id="position"></x-inputs.input-text-v>
    </div>

    <div class="form-group">
        <label for="token" class="text-dark font-size-h4 required">Введите код доступа:</label>
        <x-inputs.input-text-v name="token" id="token" placeholder="xxxx-xxxx"></x-inputs.input-text-v>
    </div>

    <div class="pb-lg-0 pb-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Назад') }}
        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Продолжить') }}
        </button>
    </div>

</form>
