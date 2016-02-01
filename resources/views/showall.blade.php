@extends('base')

@section('heading')
	{{$category}} - {{$team}}
@stop

@section('navright')
<li><a href={{action('RegisterController@logout')}}>Logout</a></li>
@stop

@section('heading-content')
@if (Session::has('message'))
{!!Session::get('message')!!}
@endif
@stop

@section('content')

<div class="row">
        <div class="col s12 m12">
        @foreach($users as $user)
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">{{$user->name}}</span>
              <p>Rollno : {{$user->rollno}}<br>Year: {{$user->year}}</p>
            </div>
            <div class="card-action">
              @if($user->approved == 0)
              <a class="waves-effect waves-light btn-large" href={{ action('AdminController@approve', array("id"=>$user->id,"team"=>$user->team)) }} >Approve</a>
              <a class="waves-effect waves-light btn-large red" href={{ action('AdminController@reject', array("id"=>$user->id,"team"=>$user->team)) }} >Reject</a>
              @elseif($user->approved == 1)
              <a class="waves-effect waves-light btn-large red" href={{ action('AdminController@reject', array("id"=>$user->id,"team"=>$user->team)) }} >Reject</a>
              @else
              <a class="waves-effect waves-light btn-large" href={{ action('AdminController@approve', array("id"=>$user->id,"team"=>$user->team)) }} >Approve</a>
              @endif
            </div>
          </div>
        @endforeach
        {!!$users->render()!!}
        </div>
</div>



@stop


