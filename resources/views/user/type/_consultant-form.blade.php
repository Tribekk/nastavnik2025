<form class="form" method="POST" action="{{ route('attach.consultant') }}">
    @csrf

    @if(session()->has('errors'))
        <x-alert type="danger" text="{{ session('errors')->first() }}"></x-alert>
    @endif

    <div class="form-group">
        <label for="regalia_and_experience" class="text-dark font-size-h4 required">Ваши регалии и опыт в области профориентации, карьерного консультирования, психологии, HR и т.п.:</label>
        <x-inputs.summernote-editor id="regalia_and_experience" name="regalia_and_experience" required></x-inputs.summernote-editor>
    </div>

    <div class="form-group">
        <label for="experience" class="text-dark font-size-h4 required">Ваш суммарный опыт работы:</label>
        <x-inputs.input-text-v type="number" min="1" name="experience" id="experience"></x-inputs.input-text-v>
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
