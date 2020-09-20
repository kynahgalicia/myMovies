<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Movies;
use App\User;
use App\Ratings;
use Illuminate\Support\Facades\Validator;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Ratings::orderBy('ratings_id','ASC')->paginate(10);

        return View::make('ratings.index',compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movies::pluck('title','movies_id');
        $users = Auth::user()->id;
        return View::make('movies.create', compact('movies','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'rating' =>'required|string',
            'comment' => 'required|string|max:500',
            'genres_id' => 'integer',
            'producers_id' => 'integer'
        ];

        $formData = $request->all();

        $validator = Validator::make($formData, $rules);

        if($validator->passes()){
            $genre = Genres::find($formData['genres_id']);
            $producer = Producers::find($formData['producers_id']);
            // dd($producer->producers_id);
            
            $movies = new Movies();
            $movies->title = $formData['title'];
            $ratings->save();

            return Redirect::to('movies.index')->with('success','New Rating added!');
        }
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
