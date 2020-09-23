@extends('layouts.app')

@section('content')

@if (Auth::user()->is_admin == 1)
    <form action="/contact_admin" method="POST">
@else
    <form action="/contact_user" method="POST">
@endif


<div class="container">
    
    <h2>Inform our team</h2>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
        @endif
        
        @if (Auth::user()->is_admin == 0)
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                <small style="font-style:italic; color:red">{{ $errors->first('name') }}</small>
                @endif
            </div>
        @endif
        
        @if (Auth::user()->is_admin == 1)
            <div class="form-group">
                <label for="email">Email:</label>
                {!! Form::select('email',$user, null,['class' => 'form-control']) !!}
            </div>
        @else
            <div class="form-group"> 
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control " id="email" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                <small style="font-style:italic; color:red">{{ $errors->first('email') }}</small>
                @endif
            </div>
        @endif
        

        <div class="form-group"> 
            <label for="message" class="control-label">Message</label>
            <textarea class="form-control " id="message" name="message" cols="38" rows="10">
                {{old('message')}}
            </textarea>
            @if($errors->has('message'))
            <small style="font-style:italic; color:red">{{ $errors->first('message') }}</small>
            @endif
        </div>
    
    <button type="submit" class="btn btn-primary">Send</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    
</div> 

</form>

@endsection