<form class="form" method="POST" action="{{ route('observe.user') }}">
    @csrf

    @if(session()->has('error'))
        <x-alert type="danger" text="{{ session('error') }}"></x-alert>
    @endif

    <x-inputs.input-text-v name="last_name" title="Фамилия ребенка" required/>

    <x-inputs.input-text-v name="first_name" title="Имя ребенка" required/>

    <x-inputs.input-text-v name="middle_name" title="Отчество ребенка"/>

    <x-inputs.input-text-v name="birth_date" id="birth_date" readonly :date-picker="true" pattern="\d*" placeholder="дд.мм.гггг" title="Дата рождения" required/>

    <x-inputs.input-text-v name="code" title="Код подтверждения" required/>

    <div class="pb-lg-0 pb-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Назад') }}
        </a>
        <button type="submit" class="btn btn-primary hover-outline font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Далее') }}
        </button>
    </div>
</form>
