@component('mail::message')
{{ $maildata['heading'] }},<br>
{{ $maildata['body'] }}<br>
Thanks,<br>
{!! str_replace('_', ' ', config('app.name')) !!}
{!! $g_about_us->address !!}
@endcomponent
