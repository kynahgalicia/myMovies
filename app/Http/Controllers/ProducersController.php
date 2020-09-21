<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Producers;
use Illuminate\Support\Facades\Validator;

class ProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = Producers::orderBy('producers_id','ASC')->paginate(10);
        return View::make('producers.index',compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('producers.create');
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
            'name' =>'required|profanity|string',
            'birthday'=>'required|date',
            'notes'=>'required|profanity|string|min:1|max:100'
        ];

        $formData = $request->all();
        $validator = Validator::make($formData, $rules);

        if($validator->passes()){
            Producers::create($request->all());

            return Redirect::to('producers')->with('success','New Producer added!');
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
        $producers = Producers::find($id);

        return View::make('producers.show')->with('producers',$producers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producers = Producers::find($id);
        return view('producers.edit',compact('producers'));
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
        $producers = Producers::find($id);
        $producers->update($request->all());
        return Redirect::to('/producers')->with('success','Producer data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producers = Producers::findOrFail($id);
        $producers->delete();
        return Redirect::to('/producers')->with('success','Producers data deleted!');
    }
}
