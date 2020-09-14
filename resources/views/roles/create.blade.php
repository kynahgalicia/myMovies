@extends('layouts.app')

@section('content')

        <div class="container">
            
            <h2>Create new role</h2>

            <form method="post" action="{{route('roles.store')}}" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="roles" class="control-label">Title</label>
                <input type="text" class="form-control" id="roles" name="roles" value="{{old('roles')}}">
                @if($errors->has('roles'))
                    <small style="font-style:italic; color:red">{{ $errors->first('roles') }}</small>
                @endif
            </div> 
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

        </div> 

    </div>

</form> 

@endsection