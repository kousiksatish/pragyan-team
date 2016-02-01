<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('adminhome');
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/')->with('message', '<font color="green">Successfully Logged out.</font>');
    }
    public function auth(Request $request)
    {
            // $username = $request->get('username'); 
            // $password=$request->get('password');
            
            // else
            // {
            //     return Redirect::to('/')->with('message', '<font color="red">Incorrect username or password</font>');
            // }
            
               
    }

    public function dashboard()
    {
    	$rollno =  Session::get('rollno');
    	$teams = Register::where('rollno', $rollno)->lists('team');
    	return view('dashboard', array("rollno"=>$rollno, "teams" => $teams));

    }
}
