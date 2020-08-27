@extends('layouts.app')

@section('body')

<div class="container">

    {{-- <h1>Showing {{ $movies->title }}</h1> --}}
    <h1>Actors</h1>

        <div class="jumbotron text-left">
            <h2>{{ $actors->name }}</h2>
            <p>
                {{-- <strong>Title:</strong> {{ $movies->title }}<br> --}}
                <strong align="left">Birthday:</strong> {{ $actors->birthday }}<br>
                <strong align="left">Notes:</strong> {{ $actors->notes }}
            </p>

            <a href="{{url()->previous()}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
