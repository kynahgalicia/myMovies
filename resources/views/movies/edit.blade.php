@extends('layouts.app')

@section('content')

    <div class="container">

    <h2>Edit Movies</h2>

    {!! Form::model($movies,['method'=>'PATCH','route' => ['movies.update',$movies->movies_id]])!!}
        {{-- {{csrf_field()}}
        {{ method_field('PATCH') }} --}}

    <div class="form-group">
        <label for="title" class="control-label">Title</label>
        {{ Form::text('title',null,array('class'=>'form-control','id'=>'title')) }}
    </div> 

    <div class="form-group"> 
        <label for="year" class="control-label">Year</label>
        {{ Form::text('year',null,array('class'=>'form-control','id'=>'year')) }}
    </div> 

    <div class="form-group"> 
        <label for="runtime" class="control-label">Runtime</label>
        {{ Form::text('runtime',null,array('class'=>'form-control','id'=>'runtime')) }}
    </div>

    <div class="form-group"> 
        <label for="plot" class="control-label">Plot</label>
        {{ Form::text('plot',null,array('class'=>'form-control','id'=>'plot')) }}
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

{!! Form::close() !!} 

@endsection