@component('mail::message')
# {{ __('Здравствуйте!') }}

Вы записаны на консультацию, на {{ $consultation->formattedStartAt }}.

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
