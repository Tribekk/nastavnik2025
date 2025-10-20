@if(Auth::user()->isEmployer)
    <x-menu-section title="{{ __('Личный кабинет') }}"></x-menu-section>

    <x-menu-item link="{{ route('employer.reports.students') }}" title="{{ __('Отчет по базе наставников') }}" icon="la la-school"></x-menu-item>

    <li class="menu-item menu-item-submenu @if(request()->is('employer/events*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                    <i class="la la-calendar-check"></i>
                </span>
            <span class="menu-text">{{ __('Мероприятия') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu" kt-hidden-height="200" style="">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <x-menu-item link="{{ route('employer.events.view') }}" title="{{ __('Мероприятия') }}" icon="la la-minus"/>
                <x-menu-item link="{{ route('employer.events.audience.view') }}" title="{{ __('Аудитория') }}" icon="la la-minus"/>
                <x-menu-item link="{{ route('employer.events.directions.view') }}" title="{{ __('Направления') }}" icon="la la-minus"></x-menu-item>
            </ul>
        </div>
    </li>

    <x-menu-item link="{{ route('orgunits.view') }}" title="{{ __('Список организаций') }}" icon="la la-list"></x-menu-item>

@endif
