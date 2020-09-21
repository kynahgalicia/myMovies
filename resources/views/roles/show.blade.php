@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Roles</h1>

        <div class="jumbotron text-left">
            {{-- <h2>{{ $genres->genre }}</h2> --}}
            <p>
                <strong align="left">Name:</strong> {{ $roles->roles }}<br>
                {{-- <strong align="left">Movies:</strong> --}}
                <strong align="left">Played by:</strong>
                @foreach ($amr as $amrs)
                    <li> <a href="{{route('actors.show',$amrs['actors']['actors_id'])}}">{{$amrs['actors']['name']}}</a> in <a href="{{route('movies.show',$amrs['movies']['movies_id'])}}">{{$amrs['movies']['title']}}</a></li> 
                @endforeach
            </p>

            <a href="{{route('roles.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection