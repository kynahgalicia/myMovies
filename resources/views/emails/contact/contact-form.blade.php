@component('mail::message')

@if (Auth::user()->is_admin == 0)
    <strong>Name: </strong>{{$data['name']}}<br>
@endif
<strong>Email: </strong>{{$data['email']}}<br>
<strong>Message: </strong><br>{{$data['message']}}<br>

@endcomponent
