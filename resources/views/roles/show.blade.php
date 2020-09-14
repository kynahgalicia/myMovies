@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Roles</h1>

        <div class="jumbotron text-left">
            {{-- <h2>{{ $genres->genre }}</h2> --}}
            <p>
                <strong align="left">Name:</strong> {{ $roles->roles }}
            </p>

            <a href="{{url()->previous()}}" class="btn btn-primary" role="button">Back</a>

        </div>

</div>

@endsection