<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

use App\Register as Register;
class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function auth(Request $request)
    {
            $username = $request->get('username'); 
            $password=$request->get('password');
            $shellcmd = "python2 nitt_imap_login.py ".$username." ".$password;
            $imap = shell_exec($shellcmd);
            if($imap == 1)
            {	
                Session::set('rollno',$username);
                return Redirect::to(action('RegisterController@dashboard')); 
            }
            else
            {
                return view('home', array('message'=> 'Incorrect Username or Password'));
            }
            
               
    }

    public function dashboard()
    {
    	$rollno =  Session::get('rollno');
    	$teams = Register::where('rollno', $rollno)->lists('team');
    	return view('dashboard', array("rollno"=>$rollno, "teams" => $teams));

    }

    public function register()
    {
    	return view('register');
    }

    public function register_back(Request $request)
    {
    	$reg = new Register;
    	$reg->name = $request->name;
		$reg->rollno = Session::get('rollno');
		$reg->phoneno = $request->phoneno;
		$reg->team = $request->team;
		$teams = Register::where('rollno', $rollno)->lists('team');
		if(in_array($teams, $team))
			return view('register', array('message'=>"You have already registered for the team $reg->team"));
		$reg->dept = $request->dept;
		$reg->year = $request->year;
		$reg->bloodgrp = $request->bloodgrp;
		$reg->shirtsize = $request->shirtsize;
		$reg->native = $request->native;
		$reg->fatname = $request->fatname;
		$fatprof = $request->fatprof;
		$image = $request->image;

		$rules = array(
                'image'=> 'required|image|max:200',
            );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return view('register', array('message'=>'File uploaded not a <200kb sized image'));
        }
        $destinationPath = base_path() . '/public/images/'; // upload path
        $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
        $fileName = str_replace(' ', '_', $reg->rollno) . '_' . $reg->team.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $fileName); 
        $reg->image = 'images/'.$fileName;

        $reg->save();

        return Redirect::to(action('RegisterController@dashboard'))->with('message', "You have successfully registered for $reg->team");
    }
}
