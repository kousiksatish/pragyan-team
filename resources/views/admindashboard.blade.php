@extends('base')

@section('heading')
	Admin Dashboard - Team {{$team}}
@stop

@section('heading-content')
	@if(Session::has('message'))
	{{Session::get('message')}}
	@endif
@stop

@section('content')
<div class="row">
List of operations
<li><a href={{action('AdminController@show', array("team"=>$team))}}>View all registered</a></li>
<li><a href={{action('AdminController@showNew', array("team"=>$team))}}>View newly registered</a></li>
<li><a href={{action('AdminController@showApproved', array("team"=>$team))}}>View approved</a></li>
<li><a href={{action('AdminController@showRejected', array("team"=>$team))}}>View rejected</a></li>
</div>
@stop