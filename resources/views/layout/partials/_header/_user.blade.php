<div class="topbar-item">
    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
         id="kt_quick_user_toggle">
        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{ __('Привет') }},</span>
        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
        <div class="symbol symbol-lg-35 symbol-25  symbol-circle">
            <div class="symbol-label" style="background-image:url({{ Auth::user()->avatarUrl }})"></div>
            <i class="symbol-badge symbol-badge-bottom bg-success"></i>
        </div>
    </div>
</div>
