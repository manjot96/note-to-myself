@extends('layouts.basic')

@section('maincontent')
    <h1>Create a New User</h1>

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
            {{Form::submit('Create User')}}
        </div>
    {{Form::close()}}
@stop
