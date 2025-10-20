@component('mail::message')
# {{ __('Здравствуйте!') }}

Ваша запись на консультацию, на: {{ $consultation->formattedStartAt }} была подтверждена.

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
