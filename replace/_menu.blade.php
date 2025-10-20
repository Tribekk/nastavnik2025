<li class="menu-item menu-item-submenu @if(request()->is('admin/authorization/*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">

    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <i class="la la-shield"></i>
        </span>
        <span class="menu-text">{{ __('Авторизация') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu" kt-hidden-height="200" style="">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <x-menu-item link="{{ route('admin.permissions.view') }}" title="{{ __('Разрешения') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.roles.view') }}" title="{{ __('Роли') }}" icon="la la-minus" />
        </ul>
    </div>
</li>

<li class="menu-item menu-item-submenu @if(request()->is('admin/reports/*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <i class="la la-chart-pie"></i>
        </span>
        <span class="menu-text">{{ __('Отчеты') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu" kt-hidden-height="200" style="">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <x-menu-item link="{{ route('admin.reports.students_tests') }}" title="{{ __('Ход тестирования учеников') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.reports.students') }}" title="{{ __('Ученики') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.reports.registrations') }}" title="{{ __('Регистрации') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.reports.student_questionnaires') }}" title="{{ __('Анкеты учеников') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.reports.tests') }}" title="{{ __('Тесты') }}" icon="la la-minus" />
            <x-menu-item link="{{ route('admin.reports.attached_parents') }}" title="{{ __('Привязка родителей') }}" icon="la la-minus" />
        </ul>
    </div>
</li>

<x-menu-item link="{{ route('user_profiles.index') }}" title="{{ __('Профили') }}" icon="la la-list-alt"></x-menu-item>
<!--
<x-menu-item link="{{ route('products.store') }}" title="{{ __('Проекты') }}" icon="la la-address-book"></x-menu-item>
--->


<x-menu-item link="{{ route('admin.users.view') }}" title="{{ __('Пользователи') }}" icon="la la-users-cog"></x-menu-item>
<x-menu-item link="{{ route('admin.schools.view') }}" title="{{ __('Компании') }}" icon="la la-list"></x-menu-item>

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

<li class="menu-item menu-item-submenu @if(request()->is('admin/orgunits*')) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <i class="la la-building"></i>
        </span>
        <span class="menu-text">{{ __('Организации') }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu" kt-hidden-height="200" style="">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <x-menu-item link="{{ route('admin.orgunits.view') }}" title="{{ __('Организации') }}" icon="la la-minus" />
           <!-- <x-menu-item link="{{ route('admin.orgunits.activity_kinds.view') }}" title="{{ __('Направления деятельности') }}" icon="la la-minus" />
            --->

            <x-menu-item link="{{ route('admin.orgunits.legal_forms.view') }}" title="{{ __('Организационно-правовые формы') }}" icon="la la-minus" />
        </ul>
    </div>
</li>

<x-menu-item link="{{ route('employer.students.list') }}" title="{{ __('Сводная таблица учеников') }}" icon="la la-list-alt"></x-menu-item>
