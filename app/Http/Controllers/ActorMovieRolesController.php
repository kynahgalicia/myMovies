<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Movies;
use App\Actors;
use App\Roles;
use App\ActorMovieRoles;
use Illuminate\Support\Facades\Validator;

class ActorMovieRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = Actors::pluck('name','actors_id');
        $roles = Roles::pluck('roles','roles_id');
        $movies = Movies::pluck('title','movies_id');
        // dd($actors);
        return View::make('actormovieroles.create', compact('actors','roles','movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $actor = Actors::find($formData['actors_id']);
        $role = Roles::find($formData['roles_id']);
        $movie = Movies::find($formData['movies_id']);

        $amr = new ActorMovieRoles();
        $amr->movies_id = $formData['movies_id'];
        $amr->actors_id = $formData['actors_id'];
        $amr->roles_id = $formData['roles_id'];
        $amr->movies()->associate($movie);
        $amr->actors()->associate($actor);
        $amr->roles()->associate($role);
        $amr->save();

        return Redirect::to('movies')->with('success','New Cast added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
