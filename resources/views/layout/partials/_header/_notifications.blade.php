@if(false)
<div class="dropdown">
    <!--begin::Toggle-->
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 @if(Auth::user()->unreadNotifications->count()) pulse pulse-primary btn-icon-primary @endif">
            <span class="pulse-ring"></span>
            <i class="fas fa-bell icon-lg"></i>
            @if(Auth::user()->unreadNotifications->count())
                <span class="ml-1 text-primary" style="font-size: 13px">{{ Auth::user()->unreadNotifications->count() }}</span>
            @endif
        </div>
    </div>
    <!--end::Toggle-->
    <!--begin::Dropdown-->
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
        <div class="px-4 mt-5">
            @forelse (Auth::user()->unreadNotifications as $notification)
                <livewire:user.notification :notification="$notification"/>
            @empty
                <div class="alert alert-outline-secondary">{{ __('Уведомлений нет') }}</div>
            @endforelse
        </div>
    </div>
    <!--end::Dropdown-->
</div>
@endif
