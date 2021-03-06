@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create new movie</h2>

    <form method="post" action="{{route('movies.store')}}" enctype="multipart/form-data" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <upload>Upload an image:</upload><br>
        <input type="file" name="images" /><br><br>

        <div class="form-group">
            <label for="title" class="control-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            @if($errors->has('title'))
            <small style="font-style:italic; color:red">{{ $errors->first('title') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="year" class="control-label">Year</label>
            <input type="text" class="form-control " id="year" name="year" value="{{old('year')}}">
            @if($errors->has('year'))
            <small style="font-style:italic; color:red">{{ $errors->first('year') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="runtime" class="control-label">Runtime</label>
            <input type="text" class="form-control " id="runtime" name="runtime" value="{{old('runtime')}}">
            @if($errors->has('runtime'))
            <small style="font-style:italic; color:red">{{ $errors->first('runtime') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="plot" class="control-label">Plot</label>
            <input type="text" class="form-control " id="plot" name="plot" value="{{old('plot')}}">
            @if($errors->has('plot'))
            <small style="font-style:italic; color:red">{{ $errors->first('plot') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="genres_id">Genres:</label>
            {!! Form::select('genres_id',$genres, null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="producers_id">Producers:</label>
            {!! Form::select('producers_id',$producers, null,['class' => 'form-control']) !!}
        </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

</div>

</div>

</form>

@endsection
