@extends('layouts.basic')

@section('maincontent')
    <h1>Register Now</h1>

    {{Form::open(['route'=>'users.store'])}}
        <div>
            {{Form::label('emailaddress', 'Email Address: ')}}
            {{Form::text('emailaddress')}}
            {{$errors->first('emailaddress', '<span class="error">:message<span>')}}
        </div>
        <div>
            {{Form::label('password', 'Password: ')}}
            {{Form::text('password')}}
            {{$errors->first('password', '<span class="error">:message<span>')}}
        </div> 
	
        <div>
            {{Form::submit('Register Now')}}
        </div>
    {{Form::close()}}
    
    <p>Already have a account? <a href="/login">Log in</a> now!</p>
@stop
