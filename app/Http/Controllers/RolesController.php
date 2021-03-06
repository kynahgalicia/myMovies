<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Roles;
use Auth;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::orderBy('roles_id','ASC')->paginate(10);
        return View::make('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->is_admin) {
            return View::make('roles.create');
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
        if (Auth::user()->is_admin) {
            $rules = [
            'roles' =>'required|string',
            ];

            $formData = $request->all();
            $validator = Validator::make($formData, $rules);

            if($validator->passes()){
                Roles::create($request->all());

                return Redirect::to('roles')->with('success','New Role added!');
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
        $roles = Roles::find($id);
        $amr = Roles::find($id)->actormovieroles()->with(['movies','actors'])->get()->toArray();

        return View::make('roles.show',compact('roles','amr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->is_admin) {
            $roles = Roles::find($id);
            return view('roles.edit',compact('roles'));
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
        if (Auth::user()->is_admin) {
            $roles = Roles::find($id);
            $roles->update($request->all());
            return Redirect::to('/roles')->with('success','Role data updated!');
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
        if (Auth::user()->is_admin) {
            $roles = Roles::findOrFail($id);
            $roles->delete();
            return Redirect::to('/roles')->with('success','Role data deleted!');
        }
        
    }

    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }
}
