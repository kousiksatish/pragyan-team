@extends('base')

@section('heading')
	Register
@stop

@section('heading-content')
	@if (isset($message))
<font color="red">{{$message}}</font>
@endif
@stop

@section('navright')
<li><a href={{action('RegisterController@logout')}}>Logout</a></li>
@stop

@section('content')
	<div class="row">
    <form method="POST" action={{action('RegisterController@register_back')}} accept-charset="UTF-8" class="col s12" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input name="name" type="text" class="validate" required>
          <label for="name">Name</label>
        </div>
        <div class="input-field col s12">
          <input name="phoneno" type="text" class="validate" pattern=[0-9]{10} required>
          <label for="phoneno">Phone no</label>
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
	        <label for="team">Team* :</label>
	    </div>
	    <div class="input-field col s12">
               
                <select class="validate" name="dept">
                  <option value="Btech ECE">Btech ECE</option>
                  <option value="Btech EEE">Btech EEE</option>
                  <option value="Btech ICE">Btech ICE</option>
                  <option value="Btech Mech">Btech Mech</option>
                  <option value="Btech MME">Btech MME</option>
                  <option value="Btech Prod">Btech Prod</option>
                  <option value="Btech CSE">Btech CSE</option>
                  <option value="Btech Chem">Btech Chem</option >
		  <option value="Btech Civil">Btech Civil</option>
                  <option value="Archi">Archi</option>
                  <option value="MCA">MCA</option>
                  <option value="DoMS">DoMS</option>
                  <option value="Mtech ECE">Mtech ECE</option>
                  <option value="Mtech EEE">Mtech EEE</option>
                  <option value="Mtech ICE">Mtech ICE</option>
                  <option value="Mtech Mech">Mtech Mech</option>
                  <option value="Mtech MME">Mtech MME</option>
                  <option value="Mtech Prod">Mtech Prod</option>
                  <option value="Mtech CSE">Mtech CSE</option>
                  <option value="Mtech Chem">Mtech Chem</option>
		  <option value="Mtech Civil">Mtech Civil</option>
                </select>
                <label for="dept">Department* :</label>
            </div>

        <div class="input-field col s12">
           
            <select class="validate" name="year">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <label for="year">Year* :</label>
        </div>
        <div class="input-field col s12">
           
            <input type="text" class="validate"  name="bloodgrp" required>
            <label for="exampleInputEmail1">Blood Group* :</label>
            <p class="help-block">Example : O Positive</p>
        </div>

        <div class="input-field col s12">
		
	    	<select id="search-type" class="validate" name="shirtsize" required>
			 <option value="S">Small</option>
                  	<option value="M">Medium</option>
                  	<option value="L">Large</option>
		  	<option value="XL">XL</option>
		  	<option value="XXL">XXL</option>
            	</select>
            	<label for="">Shirt Size* :</label>  
	    </div>

	    <div class="input-field col s12">
               
                <input type="text" class="validate"  name="native" required>
                <label for="native">Native* :</label>
            </div>
	    
	    
	    <div class="input-field col s12">
               
                <input type="text" class="validate"  name="fatname" required>
                <label for="fatname">Father's Name* :</label>
            </div>
	    
	    <div class="input-field col s12">
           
            <input type="text" class="validate"  name="fatprof">
            <label for="fatprof">Father's Profession :</label>
		</div>
		<div class="row">
		<div class="input-field col s12">
	      <div class="file-field input-field">
      <div class="btn">
        <span>IMAGE</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload a photo of yours">
      </div>
    </div>
    <li>rename file: &ltrollnumber&gt &ltteam&gt</li>
		    <li>Image Size should be lesser than 200kb and should be .jpg or .png</li>
		    <li>This photo will be used for ID card purposes. Please upload a photo of 1x1 dimension.</li>
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

