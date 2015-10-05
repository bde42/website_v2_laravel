<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ClubPost;
use App\Models\Club;
use App\Http\Requests\ClubFormRequest;
use \Redirect;

class ClubController extends Controller
{
    
    public function __construct()
	{
        $this->middleware('auth.club:administrator,restrict', ['only' => ['admin', 'store', 'create', 'destroy']]);
		$this->middleware('auth.club:administrator', ['only' => ['edit', 'update']]);
	}
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', ['clubs' => $clubs]);
    }

    /**
     * Display a listing of the resource in the dashboard.
     *
     * @return Response
     */
    public function admin()
    {
        $clubs = Club::all();
        return view('clubs.admin', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClubFormRequest $request)
    {
        $club = new Club;
        $club->name = $request->get('name');
        $club->slug = $request->get('slug');
        $club->description = $request->get('description');
        $club->photo = $request->get('photo');
        $club->website = $request->get('website');
        $club->facebook = $request->get('facebook');
        $club->slack = $request->get('slack');
        $club->save();
        return Redirect::route('admin::club-create')->with('success', 'The club has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $club = $club = $this->getClub($slug, 'clubs');
        $posts = ClubPost::where('club_id', $club->id)->get();
        return view('clubs.show', ['club' => $club, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $club = $this->getClub($id, 'admin::clubs');
		return view('clubs.update', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $club = $this->getClub($request->get('id'), 'admin::clubs');

		$club->description = $request->get('description');
		$club->photo = $request->get('photo');
		$club->website = $request->get('website');
		$club->facebook = $request->get('facebook');
		$club->slack = $request->get('slack');
		$club->save();
		return Redirect::route('admin::club-edit', ['id' => $club->slug])->with('success', 'The club has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $club = $this->getClub($id, 'admin::clubs');
        Club::destroy($club->id);
        return Redirect::route('admin::clubs')->with('success', 'The club has been deleted');
    }
	
	/**
     * Get club.
     *
     * @param  Request  $request
     * @param  int  $id or string $slug
     * @param  int  $redirect_to if an error is occured
     * @return Club
     */
	private function getClub($id, $redirect_to = 'home')
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
}
