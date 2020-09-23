<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Actors;
use Auth;
use Illuminate\Support\Facades\Validator;


class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actors::orderBy('actors_id','ASC')->withTrashed()->paginate(10);
        // $actors = Actors::all();
        // dd($actors);
        return View::make('actors.index',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin){
            return View::make('actors.create');
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
            'name' =>'required|profanity|string|min:1',
            'birthday'=>'date|required',
            'notes'=>'required|profanity|string|min:1|max:1000'
            ];

            $formData = $request->all();
            $file = $formData['images']->getClientOriginalName();
            $formData['images'] = $file;

            $validator = Validator::make($formData, $rules);

            if ($validator->passes()) {
                Actors::create($formData);
                $request->file('images')->move(storage_path().'/app/public/images/actors', $request->file('images')->getClientOriginalName());
                return Redirect::to('actors')->with('success','New Actor Record added!');
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
        $actors = Actors::find($id);
        $amr = Actors::find($id)->actormovieroles()->with(['movies','roles'])->get()->toArray();
        // dd($actors);

        return View::make('actors.show',compact('actors','amr'));
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
            $actors = Actors::find($id);
            return view('actors.edit',compact('actors'));
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
            $actors = Actors::find($id);
            // dd($customer);
            $actors->update($request->all());
            return Redirect::to('/actors')->with('success','Actor Data Updated!');
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
            $actors = Actors::findOrFail($id);
            $actors->delete();
            return Redirect::to('/actors')->with('success','Actor Data Deleted!');
        }
    }

    public function restore($id)
    {
        if(Auth::user()->is_admin){
            Actors::withTrashed()->where('actors_id',$id)->restore();
            return  Redirect::route('actors.index')->with('success','Actor restored successfully!');
        }
        
    }

    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }
}
