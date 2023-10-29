@component('mail::message')
{{ 'Contact Us Message' }}<br>
{{'Name: '.$contact_data['name']}}<br>
{{'Phone: '.$contact_data['phone']}}<br>
{{'Email: '.$contact_data['email']}}<br>
{{'Subect: '.$contact_data['subject']}}<br>
{{'Message: '.$contact_data['message']}}<br>

Thanks,<br>
{{ str_replace('_', ' ', config('app.name')) }}
@endcomponent
