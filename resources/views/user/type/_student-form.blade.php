<form class="form" method="POST" action="{{ route('attach.student') }}">
    @csrf

    @if(session()->has('errors'))
        <x-alert type="danger" text="{{ session('errors')->first() }}"></x-alert>
    @endif

    <x-inputs.input-text-v title="Дата рождения" readonly name="birth_date" id="birth_date" :date-picker="true" required placeholder="дд.мм.гггг"></x-inputs.input-text-v>

    <livewire:school.select-school-class></livewire:school.select-school-class>


    <input type="text" name="sex" value="{{ request('sex' , 1) }}" hidden>

    <div class="pb-lg-0 pb-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Назад') }}
        </a>

        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Продолжить') }}
        </button>
    </div>

</form>

@push('js')
    <script>

    </script>
@endpush
