@component('mail::message')
# {{ __('Здравствуйте!') }}

Ваша запись на консультацию, на: {{ $consultation->formattedStartAt }} была отклонена.

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
