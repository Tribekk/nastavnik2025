<li class="nav-item mr-3">
    <a class="nav-link active" data-toggle="tab" href="#user-tab">
        <span class="nav-icon">
            <i class="la la-user"></i>
        </span>
        <span class="nav-text font-size-lg">{{ __('Пользователь') }}</span>
    </a>
</li>


<li class="nav-item mr-3">
    <a class="nav-link mx-0" data-toggle="tab" href="#security-tab">
        <span class="nav-icon">
            <i class="la la-lock"></i>
        </span>
        <span class="nav-text font-size-lg">{{ __('Безопасность') }}</span>
    </a>
</li>

<li class="nav-item mr-3">
    <a class="nav-link" data-toggle="tab" href="#notifications-tab">
        <span class="nav-icon">
            <i class="la la-telegram"></i>
        </span>
        <span class="nav-text font-size-lg">
            {{ __('Уведомления') }}
            <livewire:user.profile.unread-notifications-count/>
        </span>
    </a>
</li>
@if ( auth()->user()->can('admin') || auth()->user()->hasRole('employer'))
<li class="nav-item mr-3">
    <a class="nav-link mx-0" data-toggle="tab" href="#tmp-sms-tab">
        <span class="nav-icon">
            <i class="la la-sms"></i>
        </span>
        <span class="nav-text font-size-lg">{{ __('Шаблоны смс') }}</span>
    </a>
</li>
@endif
