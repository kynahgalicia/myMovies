@extends('layouts.app')

@section('content')

<form action="/contact" method="POST">

<div class="container">
    
    <h2>Inform our team</h2>
    
    {{-- <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data" > --}}
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
        @endif
        {{-- <ul class="errors">
            @foreach($errors->all() as $message)
            <li><p>{{ $message }}</p></li>
            @endforeach
        </ul> --}}
        {{-- {{dd($errors)}}; --}}
        
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @if($errors->has('name'))
            <small style="font-style:italic; color:red">{{ $errors->first('name') }}</small>
            @endif
        </div> 
        
        <div class="form-group"> 
            <label for="email" class="control-label">Email</label>
            <input type="text" class="form-control " id="email" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
            <small style="font-style:italic; color:red">{{ $errors->first('email') }}</small>
            @endif
        </div>

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