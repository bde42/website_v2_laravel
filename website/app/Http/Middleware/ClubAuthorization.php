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

		if (current_user() == null || !isset(current_user()['login']))
			return redirect("/auth/login");
	
		//A REFACTORISER
		$results = DB::select(DB::raw("SELECT wr.id FROM website_roles AS wr LEFT JOIN roles AS r ON r.id = wr.role_id WHERE r.name = :role AND wr.nickname = :nickname"), array(
			'role' => 'administrator',
			'nickname' => current_user()['login'],
		));
		if (empty($results)) {
			$slug = isset($request->slug) ? $request->slug : $request->id;
			$results = DB::select(DB::raw("SELECT c.slug FROM clubs AS c, clubs_roles AS cr LEFT JOIN roles AS r ON r.id = cr.role_id WHERE r.name = :role AND c.id = cr.club_id AND c.slug = :club AND cr.nickname = :nickname"), array(
				'club' => $slug,
				'role' => $role,
				'nickname' => current_user()['login'],
			));
			if (empty($results))
				return ("403");
		}
        return $next($request);
    }
}
