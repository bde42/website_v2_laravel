<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class ClubAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

		//A REFACTORISER

		$club_id = DB::table('clubs')->where('slug', $request->slug)->first();
		$role_id = DB::table('clubs_roles')->where('name', $role)->first();
		
		if ($club_id == null || $role_id == null)
			return ("404");
		
		$auth = DB::table('clubs_authorizations')->where('user_id', $request->user()->id)->where('club_id', $club_id->id)->where('role_id', $role_id->id)->first();
		
		if ($auth == null) {
			$auth = DB::table('clubs_authorizations')->where('user_id', $request->user()->id)->where('club_id', $club_id->id)->where('role_id', $role_id->id)->first();
			if ($auth == null)
				return ("403");
		}
        return $next($request);
    }
}
