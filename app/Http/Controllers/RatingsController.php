<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movies;
use App\User;
use App\Ratings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Ratings::orderBy('movie_id','ASC')->with('movies','users')->paginate(10);
        // dd($ratings);

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
        
        return View::make('ratings.create', compact('movies'));
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
            'rating' =>'required|string|min:0|max:10',
            'comment' => 'required|profanity|string|max:500',
            'movie_id' => 'integer',
            'user_id' => 'integer'
        ];

        $formData = $request->all();
        // dd($formData);
        $validator = Validator::make($formData, $rules);

        if($validator->passes()){
            
            $ratings = new Ratings;
            $ratings->rating = $formData['rating'];
            $ratings->comment = $formData['comment'];
            $ratings->movie_id = $formData['movie_id'];
            $ratings->user_id = Auth::user()->id;
            // dd($ratings);
            $ratings->save();

            return Redirect::to('movies')->with('success','New Rating added!');
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
        $ratings = Ratings::find($id);
        return view('ratings.edit',compact('ratings'));
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
        $ratings = Ratings::find($id);
        $ratings = Ratings::where('ratings_id',$id)->update([
            'rating'=>$request->rating,
            'comment'=>$request->comment
        ]);
        
        return Redirect::to('/ratings')->with('success','Rating data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->is_admin) {
            $ratings = Ratings::findOrFail($id);
            $ratings->delete();
            return Redirect::to('/ratings')->with('success','Rating data deleted!');
        }
        
    }
}
