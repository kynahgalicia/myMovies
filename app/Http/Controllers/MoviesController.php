<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Movies;
use App\Genres;
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
        $movies = Movies::orderBy('movies_id','ASC')->withTrashed()->paginate(10);

        return View::make('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genres::pluck('genre','genres_id');
        return View::make('movies.create', compact('genres'));
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
            'year' => 'integer|min:' . (date("Y") - 100) . '|max:' . date("Y"),
            'plot'=>'string|min:1|max:1000',
            'runtime'=>'required|integer|min:100|max:200',
            'genres_id' => 'integer'
        ];

        $formData = $request->all();

        $validator = Validator::make($formData, $rules);

        if($validator->passes()){
            // Movies::create($formData);

            $genre = Genres::find($formData['genres_id']);
            // dd($genre->genres_id);
            
            $movies = new Movies();
            $movies->title = $formData['title'];
            $movies->plot = $formData['plot'];
            $movies->runtime = $formData['runtime'];
            $movies->year = $formData['year'];
            $movies->genres()->associate($genre);
            $movies->save();

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
        $movies = Movies::where('movies_id','=',$id)->with('genres')->get()->toArray();
        // dd($movies);;

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
        $genres = Genres::pluck('genre','genres_id');
        $movies = Movies::find($id);
        return view('movies.edit',compact('movies','genres'));
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
        $movies = Movies::where('movies_id',$id)->update([
            'title'=>$request->title,
            'year'=>$request->year,
            'runtime'=>$request->runtime,
            'plot'=>$request->plot,
            'genres_id'=>$request->genres_id
        ]);
        
        // $movies->update($request->all());
        return Redirect::to('/movies')->with('success','Movie data updated!');
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

    public function restore($id) 
    {
        Movies::withTrashed()->where('movies_id',$id)->restore();
        return  Redirect::route('movies.index')->with('success','Movie restored successfully!');
    }
}
