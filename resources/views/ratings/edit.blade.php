@extends('layouts.app')

@section('content')

    <div class="container">

    <h2>Edit Ratings</h2>

    {!! Form::model($ratings,['method'=>'PATCH','route' => ['ratings.update',$ratings->ratings_id]])!!}
        {{-- {{csrf_field()}}
        {{ method_field('PATCH') }} --}}

    <div class="form-group">
        <label for="rating" class="control-label">Rating</label>
        {{ Form::text('rating',null,array('class'=>'form-control','id'=>'rating')) }}
    </div> 

    <div class="form-group"> 
        <label for="comment" class="control-label">Comment</label>
        {{ Form::text('comment',null,array('class'=>'form-control','id'=>'comment')) }}
    </div> 

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

    </div>

</div>

{!! Form::close() !!} 

@endsection