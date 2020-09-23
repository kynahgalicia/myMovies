@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Genres</h1>

        <div class="jumbotron text-left" style="background-color: #3C3F58">
            {{-- <h2>{{ $genres->genre }}</h2> --}}
            <p>
                <strong align="left">Genre Name:</strong> {{ $genres->genre }}
            </p>

            <a href="{{route('genres.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
