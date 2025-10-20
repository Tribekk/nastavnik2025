<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

    <div class="brand flex-column-auto" id="kt_brand">
        @include('layout.partials._aside._brand-logo')

        @include('layout.partials._aside._btn-toggle')
    </div>

    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                @php

                    $dashboard_title="Рабочий стол";

                    if(Auth::user()) {
                        if(Auth::user()->getIsEmployerAttribute()) {
                            if(Auth::user()->orgunit) {
                                $dashboard_title="Профили";
                            } else {

                                 $dashboard_title="Рабочий стол";

                             }
                         }
                    }



                @endphp

                <x-menu-item link="{{ URL::to('/dashboard') }}" title="{{ $dashboard_title }}" icon="flaticon2-poll-symbol"></x-menu-item>

                @php

                if(Auth::user()->can('admin') && !auth()->user()->hasRole('employer')) {
                @endphp
                <x-menu-item link="{{ URL::to('/dashboard-admin') }}" title="Профили база" icon="la la-chart-pie"></x-menu-item>
                @php
                }
                @endphp

                @include('layout.partials._aside._menu-admin')

                @include('layout.partials._aside._menu-teacher')

                @include('layout.partials._aside._menu-student')

                @include('layout.partials._aside._menu-consultant')

                @include('layout.partials._aside._menu-employer')

                @include('layout.partials._aside._menu-parent')
            </ul>
        </div>
    </div>
</div>
