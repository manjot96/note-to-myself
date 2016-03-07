@extends('layouts.basic')

@section('maincontent')
    <h1>Users</h1>
    
    @foreach($users as $u)
        <li>{{$u->emailaddress . " " . $u->password}}</li>
    @endforeach
	
@stop