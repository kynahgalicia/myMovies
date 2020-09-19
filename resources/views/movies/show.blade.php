@extends('layouts.app')

@section('content')

<div class="container">

    {{-- <h1>Showing {{ $movies->title }}</h1> --}}
    <h1>Movies</h1>

        <div class="jumbotron text-left">
            <h2>{{ $movies[0]['title'] }}</h2>
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

            <a href="{{route('movies.index')}}" class="btn-group-xs" role="button" style="color: gray">Back</a>

        </div>

</div>

@endsection