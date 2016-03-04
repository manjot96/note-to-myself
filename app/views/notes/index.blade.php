@extends('layouts.basic')

@section('maincontent')
    <h1>Notes</h1>
    
    @foreach($notes as $n)
        <li>{{$n->note}} </li>
    @endforeach
	
@stop