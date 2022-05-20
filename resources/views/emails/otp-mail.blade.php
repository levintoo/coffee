@component('mail::message')
# Hello {{ $username }}!

Please, enter this verification code on the site to login. Do not share this code with anyone</br>

# <span class="break-all">{{ $otp }}</span>
@component('mail::button', ['url' => $actionUrl])
    validate
@endcomponent

This code will expire in 15 minutes.<br>

Regards,<br>
{{ config('app.name') }}
@slot('subcopy')
    @lang(
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser:',
        [
            'actionText' => $actionText,
        ]
    ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endcomponent
