@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Actors</h1>

        <div class="jumbotron text-left" style="background-color: #3C3F58">
            <h2>{{ $actors->name }}</h2>
            <img src="{{url('/storage/images/actors/'.$actors->images)}}" width="300px">
            <p>
                <strong align="left">Birthday:</strong> {{ $actors->birthday }}<br>
                <strong align="left">Notes:</strong> {{ $actors->notes }}<br><br>
                <strong align="left">Movies Starred:</strong>
                @foreach ($amr as $amrs)
                    <li>
                        <a href="{{route('movies.show',$amrs['movies']['movies_id'])}}">{{$amrs['movies']['title']}}</a> 
                        as 
                        <a href="{{route('roles.show',$amrs['roles']['roles_id'])}}">{{$amrs['roles']['roles']}}</a></li>
                @endforeach
            </p>

            <a href="{{route('actors.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
