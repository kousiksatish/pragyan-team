@extends('base')

@section('heading')
	Webmail Login
@stop

@section('heading-content')
	@if (isset($message))
<font color="red">{{$message}}</font>
@endif
@stop

@section('content')
@if (Session::has('message'))
{{Session::get('message')}}
@endif
<div class="row center">
	<form class="col s12" method="post">
      <div class="row">

        <div class="input-field col s12">
          <input name="username" type="text" class="validate" required>
          <label for="rollno">Roll Number</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
       </div>
       <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
	    <i class="material-icons right">send</i>
	  </button>
    </form>
</div>



@stop


