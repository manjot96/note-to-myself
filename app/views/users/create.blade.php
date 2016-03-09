@extends('layouts.basic')
@section('headers')
{{HTML::style('css/register2.css')}}
@stop
@section('maincontent')
<script src='https://www.google.com/recaptcha/api.js'></script>
    <h1>Register Now</h1>

    {{Form::open(['route'=>'users.store'])}}
    <ul>
        <li>
            <h3>
                {{Form::label('emailaddress', 'Email Address')}}
                <span id="validEmail"></span>
            <h3 style="margin-left:0px;">
            {{Form::text('emailaddress')}}
            {{$errors->first('emailaddress', '<span class="error">:message<span>')}}
        </li>
         <li>
            <h3 title="6+ Characters!">
                {{Form::label('password', 'Password') }}
                <span id="validPass"></span>
            </h3>
            {{ Form::text('password') }}
			{{$errors->first('password', '<span class="error">:message<span>')}}
        </li>
        <li>
            <h3 title="Repeat Password">
                {{Form::label('password_confirmation', 'Password Confirm') }}
            <span id="validPassConf"></span>
            </h3>
            {{ Form::text('password_confirmation') }}
			{{$errors->first('password', '<span class="error">:message<span>')}}
        </li>
	    <li class="captchali">
            <div class="g-recaptcha" style="margin-left:20px;" data-sitekey="6LcwWhoTAAAAABhnntiKN92FwtMjRRLtetCHUSw3">                
            </div>
        </li>
        <li>
            {{Form::submit('Register Now')}}
        </li>
    </ul>
    {{Form::close()}}
    
    <p>Already have a account? <a href="/login">Log in</a> now!</p>
@stop
