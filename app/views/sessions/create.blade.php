@extends('layouts/basic')

    {{Form::open(['route'=>'sessions.store'])}}
        <div>
            {{Form::label('emailaddress', 'Email Address:')}}
            {{Form::email('emailaddress')}}
        </div>
        <div>
            {{Form::label('password', 'Your password:')}}
            {{Form::password('password')}}
        </div>
        <div>
            {{Form::submit('Log in')}}
        </div>
    {{Form::close()}}
