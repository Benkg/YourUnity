@component('mail::message')
# Contact Form 

Hello,

This email was sent from {{ $name }} from this email : {{ $email }} from the Contact Us form.

Here's the message:

{{ $message }}


Take Care,<br>
{{ config('app.name') }}
@endcomponent
