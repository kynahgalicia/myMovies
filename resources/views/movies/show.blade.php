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
                <strong align="left">Plot:</strong> {{ $movies[0]['plot'] }}<br>
                <strong align="left">Genre:</strong> {{ $movies[0]['genres']['genre'] }}
            </p>

            <a href="{{url()->previous()}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection