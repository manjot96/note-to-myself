@extends('layouts.basic')

@section('maincontent')
    <h1>Users</h1>
    
    @foreach($users as $u)
        <li>{{$u->email . " " . $u->password}}</li>
    @endforeach
	
@stop