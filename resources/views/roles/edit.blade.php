@extends('layouts.app')

@section('content')

    <div class="container">

    <h2>Edit Roles</h2>

    {!! Form::model($roles,['method'=>'PATCH','route' => ['roles.update',$roles->roles_id]])!!}
        {{-- {{csrf_field()}}
        {{ method_field('PATCH') }} --}}

    <div class="form-group">
        <label for="roles" class="control-label">Roles</label>
        {{ Form::text('roles',null,array('class'=>'form-control','roles_id'=>'roles')) }}
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

    </div>

</div>

{!! Form::close() !!} 

@endsection