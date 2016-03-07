@extends('layouts/basic')

@section('maincontent')
    <h1>Login</h1>
    
    {{Form::open(['route'=>'main.store'])}}
        <div>
            {{Form::label('emailaddress', 'Email Address:')}}
            {{Form::email('emailaddress')}}
            {{$errors->first('emailaddress', '<span class="error">:message<span>')}}
        </div>
        <div>
            {{Form::label('password', 'Your password:')}}
            {{Form::password('password')}}
            {{$errors->first('password', '<span class="error">:message<span>')}}
        </div>
        <div>
            {{Form::submit('Log in')}}
        </div>
    {{Form::close()}}
@stop
