@component('mail::message')
# {{ __('Здравствуйте!') }}

{{ $message }}

@component('mail::button', ['url' => $url])
    Перейти на профтрекер
@endcomponent

@lang('С уважением'),<br>
{{ config('app.name') }}
@endcomponent
