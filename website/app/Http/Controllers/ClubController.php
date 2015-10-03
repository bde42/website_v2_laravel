<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Http\Requests\ClubFormRequest;
use \Redirect;

class ClubController extends Controller
{
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
        $club = Club::where('slug', $slug)->first();
        return view('clubs.show', ['club' => $club]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $club = Club::find($id);
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
        $club = Club::find($request->get('id'));
        if (isset($club))
        {
            $club->description = $request->get('description');
            $club->photo = $request->get('photo');
            $club->website = $request->get('website');
            $club->facebook = $request->get('facebook');
            $club->slack = $request->get('slack');
            $club->save();
            return Redirect::route('admin::club-edit', ['id' => $club->id])->with('success', 'The club has been updated successfully');
        }
        return Redirect::route('admin::club-edit', ['id' => $club->id])->with('error', "The club you tried to edit is not registered in the database");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Club::destroy($id);
        return Redirect::route('admin::clubs')->with('success', 'The club has been deleted');
    }
}
