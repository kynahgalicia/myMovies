@extends('layouts.app')

@section('content')

        <div class="container">
            
            <h2>Create new genre</h2>

            <form method="post" action="{{route('genres.store')}}" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="genre" class="control-label">Title</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{old('genre')}}">
                @if($errors->has('title'))
                    <small style="font-style:italic; color:red">{{ $errors->first('genre') }}</small>
                @endif
            </div> 
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

        </div> 

    </div>

</form> 

@endsection