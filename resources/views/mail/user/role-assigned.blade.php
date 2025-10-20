@component('mail::message')
# {{ __('Здравствуйте!') }}

@lang("Вам назначена новая роль") &mdash; {{ $title }}.

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
