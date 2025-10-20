<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-3">
            <ul class="navi navi-hover navi-link-rounded">
                <li class="navi-item">
                    <a href="{{ route('admin.users.login', $user) }}" class="navi-link">
                        <span class="navi-icon"><i class="la la-sign-in-alt"></i></span>
                        <span class="navi-text">{{ __('Вход под пользователем') }}</span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-xl-7 my-2">

            @if ($errors->any())
                <div class="alert alert-custom alert-light-danger">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">{{ $errors->first() }}</div>
                </div>
            @endif

            <div class="pb-7 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-primary font-size-h4 font-size-h1-lg">{{ $user->fullName }}</h3>
            </div>

            @include('admin.users._edit._avatar')

            <div class="form-group row my-2">
                <label class="col-4 col-form-label">{{ __('Роль') }}:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{ $user->rolesAsString }}</span>
                </div>
            </div>

            @if($user->birth_date)
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">Дата рождения:</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">{{ $user->birthDateFormatted }}</span>
                    </div>
                </div>
            @endif


            <livewire:users.account :user="$user"></livewire:users.account>
        </div>
    </div>
</div>
