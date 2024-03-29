<?php

namespace App\Http\Middleware\Admin;

use Closure;

class LoginMiddleware
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
    	if(session('infos'))
       	{
    		 return $next($request);
    	}
    	else
    	{
    		return redirect('admin/login')->with('error','请先登录');
    	}
       
    }
}
