@component('mail::message')
# {{ __('Здравствуйте!') }}

У Вас появилась новая запись на консультацию, на {{ $consultation->formattedStartAt }}<br>

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
