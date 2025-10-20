@component('mail::message')
# {{ __('Здравствуйте!') }}

{{ $message }}

@component('mail::button', ['url' => $url ?? route('dashboard')])
    Перейти на профтрекер
@endcomponent

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
