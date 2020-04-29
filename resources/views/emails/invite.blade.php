@component('mail::message')
Hi {{ $details['user'] }} ,

{{ $details['user'] }} would like to invite you to join and help manage their business in {{ env('APP_NAME') }}.

To accept this invitation, simply click the link below. Or copy and paste the URL on your browser’s address window:

Your password : {{ $details['usr_password'] }}<br>

{{ $details['url_invitation'] }}

This is an automated system email. Please do not reply to this email.

Visit our website at {{ env('APP_NAME') }} to learn more about us, or contact our support at {{ env('MAIL_SUPPORT') }}.

Thank you.


Sincerely,<br>
{{ config('app.name') }}
@endcomponent
