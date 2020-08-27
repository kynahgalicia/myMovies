@extends('layouts.app')
    @section('body')
            <div class="container">
                <h2>Create New Actor Record</h2>
                <form method="post" action="{{route('actors.store')}}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="title" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <div class="form-group">
                    <label for="lname" class="control-label">Birthday</label>
                    <input type="text" class="form-control " id="birthday" name="birthday" >
                </div>
                <div class="form-group">
                    <label for="fname" class="control-label">Notes</label>
                    <input type="text" class="form-control " id="notes" name="notes" >
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
            </div>
        </div>
        </form>
    @endsection
