<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">

        @include('layout.partials._header._menu')

        <div class="topbar">
            @include('layout.partials._header._search')
            @include('layout.partials._header._notifications')
            @include('layout.partials._header._chat')
            @include('layout.partials._header._languages')
            @include('layout.partials._header._user')
        </div>
    </div>
</div>
