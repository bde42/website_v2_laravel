<?php

	use App\Models\Club;
	use App\Models\ClubRole;

	/*
     * Get club.
     *
     * @param  Request  $request
     * @param  int  $id or string $slug
     * @param  int  $redirect_to if an error is occured
     * @return Club
     */
	function getClub($id, $redirect_to = 'home')
	{
		$club = Club::where('slug', $id)->first();
		if (!isset($club))
		{
			$club = Club::where('id', $id)->first();
			if (!isset($club))
				return Redirect::route($redirect_to)->with('error', "The club is not registered in the database");
		}
		return $club;
	}
	
	/*
     * Get roles.
     *
     * @param  Request  $request
     * @param  int  $id or string $slug
     * @param  int  $redirect_to if an error is occured
     * @return Club
     */
	function getClubRoles($id, $redirect_to = 'home')
	{
		return getClub($id, $redirect_to = 'clubs');
	}
	
	function countAdmin($club)
    {
		return DB::select(DB::raw("SELECT COUNT(*) AS count FROM clubs AS c, clubs_roles AS cr LEFT JOIN roles AS r ON r.id = cr.role_id WHERE r.name = :role AND c.id = cr.club_id AND c.slug = :club"), array(
			'club' => $club->slug,
			'role' => 'administrator'
		))[0]->count;
    }