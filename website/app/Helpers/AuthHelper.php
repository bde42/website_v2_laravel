<?php

    function login($user = null)
    {
        session(['current_user' => $user]);
    }

    function logout()
    {
        session(['current_user' => null]);
    }
    
    function current_user()
    {
        return session('current_user');
    }
    
    function hasRole($role, $club_slug = null)
    {
        //A REFACTORISER
        if (current_user() == null || !isset(current_user()['login']))
			return false;

        if (!empty($club_slug))
        {
			$results = DB::select(DB::raw("SELECT c.slug FROM clubs AS c, clubs_roles AS cr LEFT JOIN roles AS r ON r.id = cr.role_id WHERE r.name = :role AND c.id = cr.club_id AND c.slug = :club AND cr.nickname = :nickname"), array(
				'club' => $club_slug,
				'role' => $role,
				'nickname' => current_user()['login'],
			));
        }
        if (empty($results)) {
            $results = DB::select(DB::raw("SELECT wr.id FROM website_roles AS wr LEFT JOIN roles AS r ON r.id = wr.role_id WHERE r.name = :role AND wr.nickname = :nickname"), array(
                'role' => 'administrator',
                'nickname' => current_user()['login'],
            ));
            if (empty($results))
                return false;
        }
        return true;
    }