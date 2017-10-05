@component('mail::message')
# Introduction

Hello, {{ $attendee->name }}

You have successfully registered for {{ $event->event_name }}.

Here's what you need to know.

Where: {{ $event->location }}

When: {{ printDate($event->starts) }} from {{ printTime($event->starts) }} to {{ printTime($event->ends) }}.

What: {{ $event->event_description }}



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
