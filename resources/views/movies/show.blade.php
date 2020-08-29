@extends('layouts.app')

@section('content')

<div class="container">

    {{-- <h1>Showing {{ $movies->title }}</h1> --}}
    <h1>Movies</h1>

        <div class="jumbotron text-left">
            <h2>{{ $movies->title }}</h2>
            <p>
                {{-- <strong>Title:</strong> {{ $movies->title }}<br> --}}
                <strong align="left">Year:</strong> {{ $movies->year }}<br>
                <strong align="left">Plot:</strong> {{ $movies->plot }}
            </p>

            <a href="{{url()->previous()}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection