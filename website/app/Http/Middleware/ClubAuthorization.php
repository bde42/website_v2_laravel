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

		if (empty($request->user()) || empty($request->user()->nickname))
			return ("403");
	
		//A REFACTORISER

		/*
		$results = DB::select( DB::raw("SELECT wr.id FROM website_roles AS wr LEFT JOIN roles AS r ON r.id = wr.role_id AND r.name = :role WHERE wr.nickname = :nickname"), array(
			'role' => $role,
			'nickname' => $request->user()->nickname,
		));
		if (empty($result)) {
			$results = DB::select( DB::raw("SELECT cr.id FROM clubs AS c, clubs_roles AS cr LEFT JOIN roles AS r ON r.id = cr.role_id AND r.name = :role WHERE c.slug = 'level-up' AND cr.nickname = :nickname"), array(
				'role' => $role,
				'nickname' => $request->user()->nickname,
			));
			if (empty($result))
				return ("403");
		}
		*/

		$club_id = DB::table('clubs')->where('slug', $request->slug)->first()->value('id');
		$role_id = DB::table('clubs_roles')->where('name', $role)->first()->value('id');
		
		if ($club_id == null || $role_id == null)
			return ("404");
		
		$auth = DB::table('website_roles')->where('nickname', $request->user()->nickname)->where('club_id', $club_id->id)->where('role_id', $role_id->id)->first();
		
		if ($auth == null) {
			$auth = DB::table('clubs_roles')->where('nickname', $request->user()->nickname)->where('club_id', $club_id->id)->where('role_id', $role_id->id)->first();
			if ($auth == null)
				return ("403");
		}
        return $next($request);
    }
}
