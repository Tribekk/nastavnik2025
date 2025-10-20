<div>
    @if($user->hasAnyRole(['parent', 'teacher', 'curator']))
        <div class="form-group">
            <label for="school_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите компанию</label>
            <livewire:components.select2
                name="school_id" id="school_id"
                url="{{ route('admin.schools.view') }}"
                event="setSchoolId"
                placeholder="{{ __('Выберите компанию') }}"
                selected="{{ $school_id }}"
                selectedItemUrl="/school"
            />

            @error('school_id')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @elseif($user->hasRole('student'))
        @if($errors->has('school_id'))
            <x-alert type="danger" text="{{ $errors->first('school_id') }}" :close="false"></x-alert>
        @elseif($errors->has('class_id'))
            <x-alert type="danger" text="{{ $errors->first('class_id') }}" :close="false"></x-alert>
        @endif
        <livewire:school.select-school-class
            schoolId="{{ $user->school_id }}"
            classId="{{ $user->class_id }}"></livewire:school.select-school-class>
    @endif
@php
//dd($user->Roles()->get());
@endphp
    @if($user->hasRole('employer') || $user->hasRole('teacher'))
        <div class="form-group">
            <label for="orgunit_id" class="font-size-h6 font-weight-bolder text-dark required">Выберите организацию</label>
            <livewire:components.select2
                name="orgunit_id" id="orgunit_id"
                url="{{ route('admin.orgunits.view') }}"
                event="setOrgunitId"
                placeholder="{{ __('Выберите организацию') }}"
                selected="{{ $orgunit_id }}"
                selectedItemUrl="/admin/orgunits"
            />

            @error('orgunit_id')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif


    <div class="form-group">
        <label for="phone-input" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Телефон') }}</label>
            <div class="input-group input-group-lg input-group-solid">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-phone"></i>
                    </span>
                </div>
                <input id="phone-input"
                       type="tel"
                       wire:ignore onchange="@this.set('phone', this.value);"
                       class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('phone') is-invalid @enderror"
                       name="phone"
                       value="{{ old('phone', $phone) }}"
                       placeholder="{{ __('+7 (___) ___ __ __') }}"
                >
            </div>

        @error('phone')
            <span class="invalid-feedback" role="alert" style="display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="pb-lg-0 pb-5">
        <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" wire:click="submit">
            {{ __('Сохранить') }}
        </button>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone-input").inputmask("+7 (999) 999 99 99");

            window.livewire.on('setSchoolId', r => {
            @this.call("setUserSchool", r);
            });

            window.livewire.on('setClassId', r => {
            @this.call("setUserClass", r);
            });

            window.livewire.on('setOrgunitId', r => {
            @this.call("setOrgunit", r);
            });
        })
    </script>
@endpush



