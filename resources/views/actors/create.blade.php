@extends('layouts.app')
    @section('body')
        {{-- {{dd($errors)}} --}}
                {{-- display the error messages on a list
                <ul class="errors">
                    @foreach($errors->all() as $message)
                    <li><p>{{ $message }}</p></li>
                    @endforeach
                </ul> --}}
            <div class="container">
                <h2>Create New Actor Record</h2>
                <form method="post" action="{{route('actors.store')}}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                    <small>{{ $errors->first('name') }}</small>
                @endif
                </div>
                <div class="form-group">
                    <label for="birthday" class="control-label">Birthday</label>
                    <input type="text" class="form-control " id="birthday" name="birthday" value="{{old('birthday')}}" >
                    @if($errors->has('birthday'))
                    <small>{{ $errors->first('birthday') }}</small>
                @endif
                </div>
                <div class="form-group">
                    <label for="notes" class="control-label">Notes</label>
                    <input type="text" class="form-control " id="notes" name="notes" value="{{old('notes')}}" >
                    @if($errors->has('notes'))
                        <small>{{ $errors->first('notes') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
            </div>
        </div>
        </form>
    @endsection
