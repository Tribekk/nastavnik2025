<div class="tab-pane show px-7" id="notifications-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 my-2">
            @foreach($user->notifications as $notification)
                <livewire:user.notification :notification="$notification"/>
            @endforeach
        </div>
    </div>
</div>
