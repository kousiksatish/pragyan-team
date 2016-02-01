@extends('base')

@section('heading')
	Dashboard
@stop

@section('navright')
<li><a href={{action('RegisterController@logout')}}>Logout</a></li>
@stop

@section('heading-content')
	@if(Session::has('message'))
	{{Session::get('message')}}
	@endif
@stop

@section('content')
<div class="row">
Teams you have registered for are
@foreach($teams as $team)
	<li>{{$team}}</li>
@endforeach
<li><a href={{action('RegisterController@register')}}>Click here to register for new team</a></li>
</div>
@stop