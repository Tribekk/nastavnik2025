<div>
    <form wire:submit.prevent="updatePassword">
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Смена пароля') }}</h3>
        </div>
        <div class="form-group">
            <label for="current_password" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Текущий пароль') }}</label>
            <input
                wire:model="current_password"
                type="password"
                class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('current_password') is-invalid @enderror"
            >
            @error('current_password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Новый пароль') }}</label>
            <input
                wire:model="password"
                type="password"
                class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('password') is-invalid @enderror"
                name="password"
            >
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Пароль еще раз') }}</label>
            <input
                wire:model="password_confirmation"
                type="password"
                class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation"
            >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="pb-lg-0 pb-5">
            <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>
</div>

