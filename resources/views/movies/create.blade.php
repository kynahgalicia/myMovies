@extends('layouts.app')

@section('body')

        <div class="container">
            
            <h2>Create new movie</h2>

            <form method="post" action="{{route('movies.store')}}" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div> 

            <div class="form-group"> 
                <label for="year" class="control-label">Year</label>
                <input type="text" class="form-control " id="year" name="year" ></text>
            </div> 

            <div class="form-group"> 
                <label for="plot" class="control-label">Plot</label>
                <input type="text" class="form-control " id="plot" name="plot" >
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>

        </div> 

    </div>

</form> 

@endsection