@extends('base')

@section('heading')
	Create admin
@stop

@section('heading-content')
@if (Session::has('message'))
{!!Session::get('message')!!}
@endif
@stop

@section('navright')
<li><a href={{action('RegisterController@logout')}}>Logout</a></li>
@stop

@section('content')
	<div class="row">
    <form method="POST" action={{action('AdminController@store')}} accept-charset="UTF-8" class="col s12" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input name="username" type="text" class="validate" required>
          <label for="username">Username*</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password*</label>
        </div>
        <div class="input-field col s12">
          <input name="retype_password" type="password" class="validate" required>
          <label for="retype_password">Retype Password*</label>
        </div>
        <div class="input-field col s12">
               
          <select class="validate" name="team">
            <option value="Ambience">Ambience</option>
            <option value="Content">Content</option>
            <option value="Crossfire">Crossfire</option>
            <option value="CSG">CSG</option>
            <option value="Design">Design</option>
            <option value="Events">Events</option>
            <option value="Executive_Team">Executive Team</option>
            <option value="Exhibitions_&_Sangam">Exhibitions & Sangam</option>
            <option value="Guest_Lectures">Guest Lectures</option>
            <option value="Infotainment">Infotainment</option>
            <option value="Marketing">Marketing</option>
            <option value="Media_Relations">Media Relations</option>
            <option value="OC">Organising Committee</option>
            <option value="PR_&_Hospitality">PR & Hospitality</option>
            <option value="PSR">PSR</option>
            <option value="Publicity">Publicity</option>
            <option value="Quality_Assurance">Quality Assurance</option>
            <option value="Work_Culture">Work Culture</option>
            <option value="Workshops">Workshops</option>
          </select>
          <label for="team">Team*</label>
      </div>
      </div>
      </div>
      <div class="input-field col s12">
      <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
    </div>
    </form>
  </div>
@stop

