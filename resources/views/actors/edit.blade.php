@extends('layouts.app')
@section('content')
    <div class="container">
    <h2>Edit Actor Details</h2>
    {!! Form::model($actors,['method'=>'PATCH','route' => ['actors.update',$actors->actors_id], 'files'=>true]) !!}
    
    Upload an image:<br>
    {{Form::file('images')}}

    <div class="form-group">
        <br><label for="name" class="control-label">Name</label>
        {{ Form::text('name',null,array('class'=>'form-control','actors_id'=>'name')) }}
    </div>

    <div class="form-group">
        <label for="birthday" class="control-label">Birthday</label>
        {{ Form::text('birthday',null,array('class'=>'form-control','actors_id'=>'birthday')) }}
    </div>

    <div class="form-group">
        <label for="notes" class="control-label">Notes</label>
        {{ Form::text('notes',null,array('class'=>'form-control','actors_id'=>'notes')) }}
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>
{!! Form::close() !!}
@endsection
