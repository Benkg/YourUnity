@component('mail::message')
# Introduction

Hello, {{ $attendee_name }}

Congratulations on registering for {{ $event->event_name }}.

Here's what you need to know:

Where: {{ $location }}

When: {{ printDate($event->starts) }} from {{ printTime($event->starts) }} to {{ printTime($event->ends) }}.

What: {{ $event->event_description }}

@component('mail::button', ['url' => 'https://yourunity.org/dashboard'])
Go to YourUnity
@endcomponent

Take care,<br>
{{ config('app.name') }}
@endcomponent
