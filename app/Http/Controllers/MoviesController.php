<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Movies;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //----pagination-----
        $movies = Movies::orderBy('id','ASC')->paginate(10);
        // $movies = DB::table('movies')-paginate(10);

        // $movies = Movies::all();
        // dd($movies);
        return View::make('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('movies.create');
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
            'title' =>'required|string',
            'year'=>'date_format(%y)', //has an error with the format
            'plot'=>'string|min:1|max:100'
        ];

        $formData = $request->all();
        $validator = Validator::make($formData, $rules);

        if($validator->passes()){
            Movies::create($request->all());

            return Redirect::to('movies')->with('success','New Movie added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Movies::find($id);

        return View::make('movies.show')->with('movies',$movies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movies::find($id);
        return view('movies.edit',compact('movies'));
        // return View::make('edit_movies',compact('movies'));
        
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
        $movies = Movies::find($id);
        // dd($customer);
        $movies->update($request->all());
        return Redirect::to('/movies')->with('success','Movie Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movies::findOrFail($id);
        $movies->delete();
        return Redirect::to('/movies')->with('success','Movie data deleted!');
    }
}
