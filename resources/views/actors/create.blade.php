@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create New Actor Record</h2>

        <form method="post" action="{{route('actors.store')}}" enctype="multipart/form-data" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <upload>Upload an image:</upload><br>
            <input type="file" name="images" /><br><br>

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                <small style="font-style:italic; color:red">{{ $errors->first('name') }}</small>
                @endif
            </div>

            <div class="form-group">
                <label for="birthday" class="control-label">Birthday</label>
                <input type="text" class="form-control " id="birthday" name="birthday" value="{{old('birthday')}}" >
                @if($errors->has('birthday'))
                <small style="font-style:italic; color:red">{{ $errors->first('birthday') }}</small>
                @endif
            </div>

            <div class="form-group">
                <label for="notes" class="control-label">Notes</label>
                <input type="text" class="form-control " id="notes" name="notes" value="{{old('notes')}}" >
                @if($errors->has('notes'))
                <small style="font-style:italic; color:red">{{ $errors->first('notes') }}</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>
@endsection
