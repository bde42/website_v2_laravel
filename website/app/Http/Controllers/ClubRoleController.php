<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ClubRole;

use \Redirect;

class ClubRoleController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth.club:administrator', ['except' => ['show']]);
	}
    
    public function show($id)
    {
        $club = getClubRoles($id, 'admin::clubs');
		return view('clubs.roles.show', ['club' => $club]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($slug)
    {
        $club = getClub($slug, 'admin::clubs');
		return view('clubs.roles.create', ['club' => $club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  $club-slug or $club-id
     * @return Response
     */
    public function store(Request $request, $slug)
    {
        $club = getClub($slug, 'admin::clubs');
        $perm = new ClubRole;
        $perm->club_id = $club->id;
        $club->role = $request->get('role_id');
        $perm->nickname = $request->get('nickname');
        $club->save();
        return Redirect::route('club-roles', ['club' => $club])->with('success', "Permission '{$perm->role->name}' are successfully added to {$perm->nickname}!");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $club-id or $club-slug
     * @param  int  $role_id
     * @return Redirect
     */
    public function destroy($slug, $role_id)
    {
        $club = getClub($slug);
        $perm = ClubRole::find($role_id);
        if ((countAdmin($club) <= 1 || empty($perm)) && $perm->role->name == 'administrator')
            return Redirect::route('club-roles', ['club' => $club])->with('error', "You can't delete the last Admin!");
        $perm->delete();
        return Redirect::route('club-roles', ['club' => $club])->with('success', "Permission '{$perm->role->name}' are successfully removed from {$perm->nickname}!");
    }
    
}
