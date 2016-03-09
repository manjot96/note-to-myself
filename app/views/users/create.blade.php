@extends('layouts.basic')
@section('headers')
{{HTML::style('css/register2.css')}}
@stop
@section('maincontent')
    <h1>Register Now</h1>

    {{Form::open(['route'=>'users.store'])}}
    <ul>
        <li>
            <h3>
                {{Form::label('emailaddress', 'Email Address')}}
                <span id="validEmail"></span>
            <h3>
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
        </li> 
	
        <li>
            {{Form::submit('Register Now')}}
        </li>
    </ul>
    {{Form::close()}}
    
    <p>Already have a account? <a href="/login">Log in</a> now!</p>
@stop
