@extends('layouts.app')
@section('body')
    <div class="container">
    <h2>Edit Actor Details</h2>
    {!! Form::model($actors,['method'=>'PATCH','route' => ['actors.update',$actors->id]]) !!}
    {{-- {{ Form::model($actor,['route' => ['actor.update',$actor->id]]) }}
        {{csrf_field()}}
        {{ method_field('PATCH') }} --}}
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        {{ Form::text('name',null,array('class'=>'form-control','id'=>'name')) }}
    </div>
    <div class="form-group">
        <label for="birthday" class="control-label">Birthday</label>
        {{ Form::text('birthday',null,array('class'=>'form-control','id'=>'birthday')) }}
    </div>
    <div class="form-group">
        <label for="notes" class="control-label">Notes</label>
        {{ Form::text('notes',null,array('class'=>'form-control','id'=>'notes')) }}
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>
{!! Form::close() !!}
@endsection
