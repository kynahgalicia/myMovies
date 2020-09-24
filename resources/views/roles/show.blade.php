@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Roles</h1>

        <div class="jumbotron text-left" style="background-color: #3C3F58">
            <p>
                <strong align="left">Name:</strong> {{ $roles->roles }}<br>
                <strong align="left">Played by:</strong>
                @foreach ($amr as $amrs)
                    <li> 
                        <a href="{{route('actors.show',$amrs['actors']['actors_id'])}}">
                            {{$amrs['actors']['name']}}</a> 
                            in 
                            <a href="{{route('movies.show',$amrs['movies']['movies_id'])}}">{{$amrs['movies']['title']}}</a></li>
                @endforeach
            </p>

            <a href="{{route('roles.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
