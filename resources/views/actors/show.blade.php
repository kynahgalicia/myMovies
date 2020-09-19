@extends('layouts.app')

@section('content')

<div class="container">

    {{-- <h1>Showing {{ $movies->title }}</h1> --}}
    <h1>Actors</h1>

        <div class="jumbotron text-left">
            <h2>{{ $actors->name }}</h2>
            <p>
                {{-- <strong>Title:</strong> {{ $movies->title }}<br> --}}
                <strong align="left">Birthday:</strong> {{ $actors->birthday }}<br>
                <strong align="left">Notes:</strong> {{ $actors->notes }}<br><br>
                <strong align="left">Movies Starred:</strong>
                @foreach ($amr as $amrs)
                    <li><a href="{{route('movies.show',$amrs['movies']['movies_id'])}}">{{$amrs['movies']['title']}}</a> as <a href="{{route('roles.show',$amrs['roles']['roles_id'])}}">{{$amrs['roles']['roles']}}</a></li> 
                @endforeach
            </p>

            <a href="{{route('actors.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
