{{-- @extends('layouts.app')

@section('content')

<div class="container"> --}}
<h2>Create new ratings</h2>
    
    <form method="post" action="{{route('ratings.store')}}" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <input type="hidden" name="movie_id" value="$movie-id">

        <div class="form-group">
            <label for="rating" class="control-label">Rating</label>
            <input type="text" class="form-control" id="rating" name="rating" value="{{old('rating')}}">
            @if($errors->has('rating'))
            <small style="font-style:italic; color:red">{{ $errors->first('rating') }}</small>
            @endif
        </div> 
        
        <div class="form-group"> 
            <label for="comment" class="control-label">Comment</label>
            <input type="text" class="form-control " id="comment" name="comment" value="{{old('comment')}}">
            @if($errors->has('comment'))
            <small style="font-style:italic; color:red">{{ $errors->first('comment') }}</small>
            @endif
        </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    
</div> 

</div>

</form>

{{-- @endsection --}}

{{-- @extends('layouts.app')

@section('content')

<div class="container">
    
    <h2>Create new ratings</h2>
    
    <form method="post" action="{{route('ratings.store')}}" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group">
            <label for="rating" class="control-label">Rating</label>
            <input type="text" class="form-control" id="rating" name="rating" value="{{old('rating')}}">
            @if($errors->has('rating'))
            <small style="font-style:italic; color:red">{{ $errors->first('rating') }}</small>
            @endif
        </div> 
        
        <div class="form-group"> 
            <label for="comment" class="control-label">Comment</label>
            <input type="text" class="form-control " id="comment" name="comment" value="{{old('comment')}}">
            @if($errors->has('comment'))
            <small style="font-style:italic; color:red">{{ $errors->first('comment') }}</small>
            @endif
        </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
    
</div> 

</div>

</form> 

@endsection --}}