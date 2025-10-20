@component('mail::message')
# {{ __('Здравствуйте!') }}

К консультацию, на: {{ $consultation->formattedStartAt }} была добавлена ссылка на онлайн-консультацию.<br>
Ссылка на онлайн-консультацию, в {{ $consultation->communicationTypeLabel }}:<br>
<a href="{{ $consultation->communication_type_value }}">{{ $consultation->communication_type_value }}</a>

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
