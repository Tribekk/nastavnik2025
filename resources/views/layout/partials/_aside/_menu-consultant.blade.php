@if(Auth::user()->hasAnyRole(['consultant']))
    <x-menu-section title="{{ __('Личный кабинет') }}"></x-menu-section>

    <x-menu-item link="{{ route('consultant.business_card') }}" title="{{ __('Визитка') }}" icon="la la-address-card"></x-menu-item>
    <x-menu-item link="{{ route('consultant.meeting_schedule') }}" title="{{ __('График') }}" icon="la la-calendar"></x-menu-item>
    <x-menu-item link="{{ route('consultations.list') }}" title="{{ __('Консультации') }}" icon="la la-headphones"></x-menu-item>

    @if(!Auth::user()->isAdmin)
        <li class="menu-item menu-item-submenu @if(request()->is('results/*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="svg-icon menu-icon">
                    <i class="la la-certificate"></i>
                </span>
                <span class="menu-text">{{ __('Результаты') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu" kt-hidden-height="200" style="">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <x-menu-item link="{{ route('results.student_questionnaire') }}" title="{{ __('Анкеты учащихся') }}" icon="la la-minus" />
                    <x-menu-item link="{{ route('results.parent_questionnaire') }}" title="{{ __('Анкеты родителей') }}" icon="la la-minus" />
                </ul>
            </div>
        </li>
    @endif

    <li class="menu-item menu-item-submenu @if(request()->is('events*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">
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
                <x-menu-item link="{{ route('events.view') }}" title="{{ __('Список моих мероприятий') }}" icon="la la-minus"/>
                <x-menu-item link="{{ route('events.invites.view') }}" title="{{ __('Приглашения на мероприятия') }}" icon="la la-minus"/>
            </ul>
        </div>
    </li>
@endif
