<form class="form" method="POST" action="{{ route('user.update') }}">
    @csrf
    @method('PATCH')

    <div class="pb-13 pt-lg-0 pt-5">
        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Мои данные') }}</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
            <div class="alert-icon">
                <i class="la la-check icon-2x"></i>
            </div>
            <div class="alert-text">{{Session::get('success')}}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="ki ki-close"></i>
                    </span>
                </button>
            </div>
        </div>
    @endif

    <div class="form-group">
        <label for="email" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Электронная почта')  }}</label>
        <input
            id="email"
            class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('email') is-invalid @enderror"
            type="text"
            name="email"
            value="{{ $user->email }}"
            autocomplete="email"
        />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="last_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Фамилия') }}</label>
        <input
            id="last_name"
            type="text"
            class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('last_name') is-invalid @enderror"
            name="last_name"
            value="{{ $user->last_name }}"
            autocomplete="last_name">

        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="first_name" class="font-size-h6 font-weight-bolder text-dark required">{{ __('Имя') }}</label>
        <input
            id="first_name"
            type="text"
            class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('first_name') is-invalid @enderror"
            name="first_name"
            value="{{ $user->first_name }}"
            autocomplete="first_name">

        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="middle_name" class="font-size-h6 font-weight-bolder text-dark">{{ __('Отчество') }}</label>
        <input
            id="middle_name"
            type="text"
            class="form-control form-control-solid h-auto py-4 px-6 rounded-lg @error('middle_name') is-invalid @enderror"
            name="middle_name"
            value="{{ $user->middle_name }}"
            autocomplete="middle_name">

        @error('middle_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="pb-lg-0 pb-5">
        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Сохранить') }}
        </button>
    </div>

</form>
