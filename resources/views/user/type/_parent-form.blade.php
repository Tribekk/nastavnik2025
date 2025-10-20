<form class="form" method="POST" action="{{ route('attach.parent') }}">
    @csrf

    @if(session()->has('errors'))
        <x-alert type="danger" text="{{ session('errors')->first() }}"></x-alert>
    @endif

    <div class="form-group">
        <label for="school" class="text-dark font-size-h4 required">Компания, в которой обучается Ваш ребенок:</label>
        <livewire:components.select2
            name="school_id" id="school"
            url="{{ route('admin.schools.view') }}"
            event="setSchool"
            placeholder="{{__('Компания')}}"
            selected="{{ old('school_id') }}"
            selectedItemUrl="/admin/schools"
        />
        @error('school_id')
        <span class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <livewire:user.attach.select-parent-sex sex="{{ old('sex', 1) }}"></livewire:user.attach.select-parent-sex>

    <div class="pb-lg-0 pb-5">
        <a href="{{ route('dashboard')}}" class="btn btn-outline-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Назад') }}
        </a>
        <button type="submit" class="btn btn-primary hover-outline font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Далее') }}
        </button>
    </div>

</form>
