<div>

    <h5 class="mb-5">{{ __('Уведомления') }}</h5>

    @forelse (Auth::user()->unreadNotifications as $notification)
        <livewire:user.notification :notification="$notification"/>
    @empty
        <div class="alert alert-outline-secondary">{{ __('Уведомлений нет') }}</div>
    @endforelse

</div>
