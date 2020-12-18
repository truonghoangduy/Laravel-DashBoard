<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,... $roles)
    {
        {

            if(!$request->user()){
                return redirect("login");
            }
            else{
                foreach ($roles as $role){
                    if ($request->user()->hasRole($role)){

                        return $next($request);
                    }
                }

            }
            \RealRashid\SweetAlert\Facades\Alert::error('Permission denied', "You can't perform this action");
            return redirect()->back();
//            return redirect("home")->with('error',"Permission denied you can't perform this action");
        }
    }
}
