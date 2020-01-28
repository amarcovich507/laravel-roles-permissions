<?php 

namespace App\Http\Middleware;

use Closure;
use Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
		if(auth()->user())
		{
			if($permission !== null && !auth()->user()->can($permission)) 
			{
				abort(401);
			}
		}
		else
		{
			abort(401);
		}
		
        return $next($request);
    }
}
