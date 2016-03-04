@extends('layouts.basic')

@section('maincontent')
    <h1>Images</h1>
    
    @foreach($images as $i)
        echo '<img width=150 height=150 src="data:image/jpeg;base64,'.base64_encode($i).'"/>';
    @endforeach
	
@stop