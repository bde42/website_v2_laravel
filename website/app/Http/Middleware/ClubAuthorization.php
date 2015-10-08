<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use \Redirect;

class ClubAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure	$next
     * @param  string	$role
     * @param  string	$type
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $type = null)
    {
		$slug = $type != 'restrict' ? (isset($request->slug) ? $request->slug : $request->id) : null;
		
		$permission = hasPerm($role, $slug);
		
		if ($permission === true)
			return $next($request);
		
		return $permission;
    }
}
