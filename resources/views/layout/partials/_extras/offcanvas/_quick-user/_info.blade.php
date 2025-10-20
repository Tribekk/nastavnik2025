<div class="d-flex align-items-center mt-5">
    <div class="symbol symbol-100 mr-5">
        <div class="symbol-label" style="background-image:url({{ Auth::user()->avatarUrl }})"></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div class="d-flex flex-column">
        <a href="{{ route('user.edit') }}"
           class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}
        </a>
        <div class="text-muted mt-1">{{ Auth::user()->typeAsString }}</div>
        <div class="navi mt-2">
            @if(Auth::user()->email)
                <a href="mailto:{{ Auth::user()->email }}" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <i class="la la-envelope"></i>
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                </a>
            @endif
            <a href="{{ route('logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{ __('Выход') }}</a>
        </div>
    </div>
</div>
