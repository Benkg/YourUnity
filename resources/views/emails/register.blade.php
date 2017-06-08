@component('mail::message')
# Introduction

Hello, {{ $user->name }}

Thank you for registering with YourUnity!

@component('mail::button', ['url' => 'https://app.dev'])
Go to YourUnity
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
