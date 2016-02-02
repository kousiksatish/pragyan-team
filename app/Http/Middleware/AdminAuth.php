<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('admin_team'))
        {
            $team = $request->route()->parameter('team');
            $team_session = Session::get('admin_team');
            if($team == Session::get('admin_team')||$team_session == 'all')
                return $next($request);
            else
                return Redirect::to("/admin/$team_session")->with('message', 'Trying to access wrong team!');
        }
        else
        {
            return Redirect::to('/')->with('message', 'Not logged in as admin');
        }
    }
}
