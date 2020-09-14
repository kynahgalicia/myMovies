@extends('layouts.app')

@section('content')

    <div class="container">

    <h2>Edit Genres</h2>

    {!! Form::model($genres,['method'=>'PATCH','route' => ['genres.update',$genres->genres_id]])!!}
        {{-- {{csrf_field()}}
        {{ method_field('PATCH') }} --}}

    <div class="form-group">
        <label for="genre" class="control-label">Genre</label>
        {{ Form::text('genre',null,array('class'=>'form-control','genres_id'=>'genre')) }}
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

    </div>

</div>

{!! Form::close() !!} 

@endsection