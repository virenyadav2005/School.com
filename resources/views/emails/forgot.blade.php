@component('mail::message')
Hello {{$user->name}}

<p>We understand it happens .</p>
@component('mail::button',['url' => url('reset/'. $user->remember_token )])
Reset your Password    
@endcomponent

<p> In case you have issue in recovering you password . Please contact us.</p>
Thanks,<br>
{{config('app.name')}}
    
@endcomponent