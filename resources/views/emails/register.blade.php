@component('mail::message')
# YourUnity

Hello, {{ $user->name_first }}

Thank you for registering with YourUnity!

@component('mail::button', ['url' => 'https://yourunity.org/dashboard'])
Go to YourUnity
@endcomponent

Thanks,<br>
YourUnity Team
@endcomponent
