<div class="form-group">
    <div class="row">
        <div class="col-auto">
            <div class="image-input image-input-outline" style="background-image: url({{ $user->avatarUrl }})">
                <div class="image-input-wrapper" style="background-image: url({{ $user->avatarUrl }})"></div>

{{--                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
{{--                      data-action="remove"--}}
{{--                      data-toggle="tooltip"--}}
{{--                      data-original-title="{{ __('Удалить') }}">--}}
{{--                    <i class="ki ki-bold-close icon-xs text-muted"></i>--}}
{{--                </span>--}}
            </div>
        </div>
        <div class="col-12 col-md-6 ml-3">
            <div class="form-group row my-2">
                <label class="col-4 col-form-label">Email:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">
                        @if($user->email)
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            @unless($user->email_verified_at)
                                <span class="d-block font-size-sm text-muted">{{ __('не подтвержден') }}</span>
                            @endunless
                        @else
                             <span class="text-muted">Не указан</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="form-group row my-2">
                <label class="col-4 col-form-label">Телефон:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">
                        <a href="tel:{{ unFormatPhone($user->phone) }}" class="text-muted text-hover-primary" id="phone">
                           {{ str_replace('+7', '', $user->phone) }}
                        </a>
                        @unless($user->phone_verified_at)
                            <span class="d-block font-size-sm text-muted">{{ __('не подтвержден') }}</span>
                        @endunless
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
@endpush
