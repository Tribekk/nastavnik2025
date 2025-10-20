@if(Auth::user()->hasRole('student'))
    <x-menu-section title="{{ __('Личный кабинет') }}"></x-menu-section>

    <x-menu-item link="{{ route('quiz.view') }}" title="{{ __('Вопросы и кейсы') }}" icon="la la-list-alt"></x-menu-item>
    <x-menu-item link="{{ route('quiz.results') }}" title="{{ __('Результаты') }}" icon="la la-poll-h"></x-menu-item>
{{--    <li class="menu-item menu-item-submenu @if(request()->is('consultations/*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">--}}

{{--        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--            <span class="svg-icon menu-icon">--}}
{{--                <i class="la la-headphones"></i>--}}
{{--            </span>--}}
{{--            <span class="menu-text">{{ __('Консультации') }}</span>--}}
{{--            <i class="menu-arrow"></i>--}}
{{--        </a>--}}
{{--        <div class="menu-submenu" kt-hidden-height="200" style="">--}}
{{--            <i class="menu-arrow"></i>--}}
{{--            <ul class="menu-subnav">--}}
{{--                <x-menu-item link="{{ route('consultations.record.form') }}" title="{{ __('Запись') }}" icon="la la-minus" />--}}
{{--                <x-menu-item link="{{ route('consultations.list') }}" title="{{ __('Консультации') }}" icon="la la-minus" />--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </li>--}}

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

    <x-menu-item link="{{ route('feedback.form') }}" title="{{ __('Обратная связь') }}" icon="la la-comments"></x-menu-item>
@endif
