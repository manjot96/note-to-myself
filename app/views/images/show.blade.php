@extends('layouts.basic')

@section('maincontent')
    <h1>User id {{$u->id}}</h1>
		<li>{{$u->emailaddress . "        " . $u->password}}</li>
@stop