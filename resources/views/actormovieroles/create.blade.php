@extends('layouts.app')

@section('content')

<div class="container">
    
    <h2>Create new Cast</h2>
    
    <form method="post" action="{{route('actormovieroles.store')}}" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        {{-- <ul class="errors">
            @foreach($errors->all() as $message)
            <li><p>{{ $message }}</p></li>
            @endforeach
        </ul> --}}
        {{-- {{dd($errors)}}; --}}

        <div class="form-group">
            <label for="movies_id">Movies:</label>
            {!! Form::select('movies_id',$movies, null,['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            <label for="actors_id">Actor:</label>
            {!! Form::select('actors_id',$actors, null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="roles_id">Role:</label>
            {!! Form::select('roles_id',$roles, null,['class' => 'form-control']) !!}
        </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    
</div> 

</div>

</form> 

@endsection