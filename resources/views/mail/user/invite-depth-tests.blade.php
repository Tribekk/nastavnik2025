@component('mail::message')
# {{ __('Здравствуйте!') }}

@lang("Вы были приглашены на прохождение глубинного тестирования").

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
