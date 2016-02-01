<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Register as Register;

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

    public function show($team)
    {
        //
        $users = Register::where('team', $team)->orderBy("updated_at", "desc")->paginate(10);
        $users->setPath('admin/$team/all');
        return view('showall', array("users"=>$users, "team"=>$team, "category"=>"All"));

    }
    public function showNew($team)
    {
        //
        $users = Register::where('approved', 0)->where('team', $team)->orderBy("updated_at", "desc")->paginate(10);
        $users->setPath("admin/$team/new");
        return view('showall', array("users"=>$users, "team"=>$team, "category"=>"New"));

    }
    public function showApproved($team)
    {
        //
        $users = Register::where('approved', 1)->where('team', $team)->orderBy("updated_at", "desc")->paginate(10);
        $users->setPath("admin/$team/approved");
        return view('showall', array("users"=>$users, "team"=>$team, "category"=>"Approved"));

    }

    public function showRejected($team)
    {
        //
        $users = Register::where('approved', 2)->where('team', $team)->orderBy("updated_at", "desc")->paginate(10);
        $users->setPath("admin/$team/rejected");
        return view('showall', array("users"=>$users, "team"=>$team, "category"=>"Rejected"));

    }

    public function approve($team, $id)
    {
        //
        Register::where('id', $id)
            ->where('team', $team)
            ->update(array(
                    "approved"=>1
                ));
        return back()->with('message', 'Successfully approved!');
    }

    public function reject($team, $id)
    {
        Register::where('id', $id)
            ->where('team', $team)
            ->update(array(
                    "approved"=>2
                ));

        return back()->with('message', 'Successfully rejected!');
    }

}
