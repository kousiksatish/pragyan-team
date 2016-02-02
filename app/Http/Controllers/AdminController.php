<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Register as Register;
use App\Admin as Admin;

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

    public function create()
    {
        return view('admincreate');
    }
    public function store(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $retype_password = $request->get('retype_password');
        $team = $request->get('team');
        if($password != $retype_password)
            return Redirect::to(action('AdminController@create'))->with('message', "<font color='red'>Password mismatch</font>");
        $team = $request->get('team');

        $admin = new Admin;
        $admin->username = $username;
        $admin->password = $password;
        $admin->team = $team;
        $admin->save();

        return Redirect::to('/admin/create')->with('message', "New admin added successfully!");

    }
    public function auth(Request $request)
    {
        $username = $request->get('username'); 
        $password = $request->get('password');
        if($username == env('ADMIN_USERNAME') && $password == env('ADMIN_PASSWORD'))
        {
            Session::put('super_admin', $username);
            Session::put('admin_team', 'all');
            return redirect('/admin/create');
        }
        else
        {
            $admin = Admin::where('username', $username)->where('password', $password)->first();
            if($admin)
            {
                Session::set('admin_team', $admin->team);
                return Redirect::to("/admin/$admin->team");
            }
            else
                return Redirect::to('/admin')->with('message', '<font color="red">Incorrect username or password</font>');
        }
        
               
    }

    public function show($team)
    {
        //
        $users = Register::where('team', $team)->orderBy("updated_at", "desc")->paginate(10);
        $users->setPath('admin/$team/all');
        return view('showall', array("users"=>$users, "team"=>$team, "category"=>"All"));

    }

    public function dashboard($team)
    {
        return view('admindashboard', array("team"=>$team));
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

        return back()->with('message', 'Successfully rejected0!');
    }

}
