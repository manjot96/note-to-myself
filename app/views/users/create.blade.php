@extends('layouts.basic')

@section('maincontent')
<script src='https://www.google.com/recaptcha/api.js'></script>
    <h1>Register Now</h1>

    {{Form::open(['route'=>'users.store'])}}
        <div>
            {{Form::label('emailaddress', 'Email Address: ')}}
            {{Form::text('emailaddress')}}
            {{$errors->first('emailaddress', '<span class="error">:message<span>')}}
        </div>
         <div>
            {{ Form::label('password', 'Password') }}
            {{ Form::text('password') }}
			{{$errors->first('password', '<span class="error">:message<span>')}}
        </div>
        <div>
            {{ Form::label('password_confirmation', 'Password Confirm') }}
            {{ Form::text('password_confirmation') }}
			{{$errors->first('password', '<span class="error">:message<span>')}}
        </div>
        </div> 
		<div class="g-recaptcha" data-sitekey="6LcwWhoTAAAAABhnntiKN92FwtMjRRLtetCHUSw3"></div>
        <div>
            {{Form::submit('Register Now')}}
        </div>
    {{Form::close()}}
    
    <p>Already have a account? <a href="/login">Log in</a> now!</p>
@stop
