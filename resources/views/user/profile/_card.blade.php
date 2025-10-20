<div class="card card-custom">

    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                @include('user.profile._nav-items')
            </ul>
        </div>
    </div>

    <div class="card-body px-0">
        <div class="tab-content">
            @include('user.profile._user-tab')
            @include('user.profile._security-tab')
            @include('user.profile._notifications-tab')
            @include('user.profile._tmp-sms-tab')
        </div>
    </div>

</div>
