<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Genres;
use Auth;
use Illuminate\Support\Facades\Validator;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genres::orderBy('genres_id','ASC')->paginate(10);
        return View::make('genres.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin){
            return View::make('genres.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->is_admin){
            $rules = [
            'genre' =>'required|profanity|string',
            ];

            $formData = $request->all();
            $validator = Validator::make($formData, $rules);

            if($validator->passes()){
                Genres::create($formData);

                return Redirect::to('genres')->with('success','New Genre added!');
            }
            return redirect()->back()->withInput()->withErrors($validator);
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
        $genres = Genres::find($id);

        return View::make('genres.show')->with('genres',$genres);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->is_admin){
            $genres = Genres::find($id);
            return view('genres.edit',compact('genres'));
        }
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
        if(Auth::user()->is_admin){
            $genres = Genres::find($id);
            $genres->update($request->all());
            return Redirect::to('/genres')->with('success','Genre data updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->is_admin){
            $genres = Genres::findOrFail($id);
            $genres->delete();
            return Redirect::to('/genres')->with('success','Genre data deleted!');
        }
    }

    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }
}
