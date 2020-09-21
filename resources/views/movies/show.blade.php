@extends('layouts.app')

@section('content')

<div class="container">

    {{-- <h1>Showing {{ $movies->title }}</h1> --}}
    <h1>Movies</h1>

        <div class="jumbotron text-left">
            <h2>{{ $movies[0]['title'] }}</h2>
            <img src="{{url('/storage/images/movies/'.$movies[0]['images'])}}" width="300px">
            <p>
                <strong align="left">Year:</strong> {{ $movies[0]['year'] }}<br>
                <strong align="left">Runtime:</strong> {{ $movies[0]['runtime'] }}<br>
                <strong align="left">Plot:</strong> {{ $movies[0]['plot'] }}<br><br>
                <strong align="left">Genre:</strong> <a href="{{route('genres.show',$movies[0]['genres']['genres_id'])}}"> {{ $movies[0]['genres']['genre'] }}</a><br>
                <strong align="left">Producer:</strong> <a href="{{route('producers.show',$movies[0]['producers']['producers_id'])}}"> {{ $movies[0]['producers']['name'] }}</a><br>
                <strong align="left">Cast:</strong>
                @foreach ($amr as $amrs)
                    <li><a href="{{route('actors.show',$amrs['actors']['actors_id'])}}">{{$amrs['actors']['name']}}</a> as <a href="{{route('roles.show',$amrs['roles']['roles_id'])}}">{{$amrs['roles']['roles']}}</a></li> 
                @endforeach
                
            </p>

            <a href="{{route('actormovieroles.create')}}" class="btn btn-primary a-btn-slide-text" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                <span><strong>Add Cast</strong></span>            
            </a><br><br>

                @if ($name == FALSE)
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($ratings as $rating)
                                        <tr>
                                            <td>{{$rating['users']['name']}}</td>
                                            <td>{{$rating['rating']}}</td>
                                            <td>{{$rating['comment']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @else
                    <form method="post" action="{{route('ratings.store')}}" >
                    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                        <input type="hidden" name="movie_id" value="{{$movies[0]['movies_id']}}">
            
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
            
                    </form>
                @endif

            <br><a href="{{route('movies.index')}}" class="btn-group-xs" role="button" style="color: gray">Back</a>

        </div>

</div>

@endsection