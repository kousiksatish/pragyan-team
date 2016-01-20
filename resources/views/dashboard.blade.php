@extends('base')

@section('heading')
	Dashboard
@stop

@section('heading-content')
	@if(isset($message))
	{{$message}}
	@endif
@stop

@section('content')

@stop