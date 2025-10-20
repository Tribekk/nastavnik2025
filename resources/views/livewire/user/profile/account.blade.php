<div>
    <form wire:submit.prevent="updateUser">
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Мои данные1') }}</h3>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-auto">
                    <div class="image-input image-input-outline" style="background-image: url({{ Auth::user()->avatarUrl }})">
                        <div class="image-input-wrapper" style="background-image: url({{ Auth::user()->avatarUrl }})"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                               data-action="change" data-toggle="tooltip" title=""
                               data-original-title="{{ __('Изменить') }}">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input type="file" wire:model="new_avatar" name="new_avatar">
                            <input type="hidden" name="profile_avatar_remove">
                        </label>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                              wire:click="removeAvatar"
                              data-action="remove"
                              data-toggle="tooltip"
                              data-original-title="{{ __('Удалить') }}">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="col-6 ml-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="font-weight-bold mr-2">Email:</span>
                        @if($email)
                            <a href="mailto:{{ $email }}" class="text-muted text-hover-primary">{{ $email }}</a>
                        @else
                           <span class="text-muted">Не указан</span>
                        @endif
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="font-weight-bold mr-2">Телефон:</span>
                        <a href="tel:{{ unFormatPhone($phone) }}" class="text-muted text-hover-primary" id="phone">{{ $phone }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">{{ __('Роль') }}:</span>
                        <span class="text-muted">{{ Auth::user()->rolesAsString }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @error('new_avatar')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="last_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Фамилия') }}</label>
            <input wire:model="last_name" type="text" id="last_name" name="last_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('last_name') is-invalid @enderror">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="first_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Имя') }}</label>
            <input wire:model="first_name" id="first_name" name="first_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('first_name') is-invalid @enderror">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="middle_name" class="font-size-h6 font-weight-bolder text-dark">{{ __('Отчество') }}</label>
            <input wire:model="middle_name" id="middle_name" name="middle_name" class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('middle_name') is-invalid @enderror">
            @error('middle_name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        @if(Auth::user()->hasRole('parent'))
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
        @elseif(Auth::user()->hasRole('student'))
            @if($errors->has('school_id'))
                <x-alert type="danger" text="{{ $errors->first('school_id') }}" :close="false"></x-alert>
            @elseif($errors->has('class_id'))
                <x-alert type="danger" text="{{ $errors->first('class_id') }}" :close="false"></x-alert>
            @endif
            <livewire:school.select-school-class
                schoolId="{{ Auth::user()->school_id }}"
                classId="{{ Auth::user()->class_id }}"></livewire:school.select-school-class>
        @endif

        <div class="pb-lg-0 pb-5">
            <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                {{ __('Сохранить') }}
            </button>
        </div>

    </form>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })

        document.addEventListener('DOMContentLoaded', function () {
            window.livewire.on('setSchoolId', r => {
                @this.call("setUserSchool", r);
            });

            window.livewire.on('setClassId', r => {
                @this.call("setUserClass", r);
            });
        });
    </script>
@endpush
