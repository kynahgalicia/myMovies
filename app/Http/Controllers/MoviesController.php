<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Movies;
use App\Genres;
use App\Producers;
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
        $producers = Producers::pluck('name','producers_id');
        return View::make('movies.create', compact('genres','producers'));
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
            'images'=>'required',
            'genres_id' => 'integer',
            'producers_id' => 'integer'
        ];

        $formData = $request->all();
        $file = $formData['images']->getClientOriginalName();
        $formData['images'] = $file;

        $validator = Validator::make($formData, $rules);

        if($validator->passes()){

            $genre = Genres::find($formData['genres_id']);
            $producer = Producers::find($formData['producers_id']);
            // dd($producer->producers_id);
            
            $movies = new Movies();
            $movies->title = $formData['title'];
            $movies->plot = $formData['plot'];
            $movies->runtime = $formData['runtime'];
            $movies->year = $formData['year'];
            $movies->images = $request->file('images')->move(storage_path().'/app/public/images/movies', $request->file('images')->getClientOriginalName());
            $movies->genres()->associate($genre);
            $movies->producers()->associate($producer);
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
        $movies = Movies::find($id)->with(['genres','producers'])->get();
        // dd($movies);
        $amr = Movies::find($id)->actormovieroles()->with(['actors','roles'])->get()->toArray();
        // dd($amr);

        return View::make('movies.show',compact('movies','amr'));
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
        $producers = Producers::pluck('name','producers_id');
        $movies = Movies::find($id);
        return view('movies.edit',compact('movies','genres','producers'));
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
            'genres_id'=>$request->genres_id,
            'producers_id'=>$request->producers_id
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
