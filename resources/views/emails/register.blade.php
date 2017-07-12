@component('mail::message')
# YourUnity

Hello, {{ $user->name }}

Thank you for registering with YourUnity!

@component('mail::button', ['url' => 'https://yourunity.org/dashboard'])
Go to YourUnity
@endcomponent

Thanks,<br>
YourUnity Team
@endcomponent
