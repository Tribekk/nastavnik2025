@component('mail::message')
# {{ __('Здравствуйте!') }}

@lang("Вам был прикреплен родитель") &mdash; {{ $title }}.

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
