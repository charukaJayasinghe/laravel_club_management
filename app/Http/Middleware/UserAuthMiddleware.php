<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\nalanda_user;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

               if($request->hasSession()){

            if($request->session()->has('user')){
                $result = nalanda_user::where("id","=",$request->session()->get('user')['id'])->get()->first();
                if($result->user_status_id == "2"){
                    return $next($request);
                }else{
                    return redirect()->route('Userlogin');
                }
            }else{
                return redirect()->route('Userlogin');
            }
        }else{
            return redirect()->route('Userlogin');
        }

    }
}
