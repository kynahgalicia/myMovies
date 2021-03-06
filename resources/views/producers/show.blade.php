@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Producers</h1>

        <div class="jumbotron text-left" style="background-color: #3C3F58">
            <h2>{{ $producers->name }}</h2>
            <p>
                <strong align="left">Birthday:</strong> {{ $producers->birthday }}<br>
                <strong align="left">Notes:</strong> {{ $producers->notes }}
            </p>

            <a href="{{route('producers.index')}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection
