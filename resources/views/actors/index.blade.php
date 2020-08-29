<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Actors</title>
        @extends('layouts.app')
    </head>

    <body>
        @section('content')

        <div class="container">

            <a href="{{route('actors.create')}}" class="btn btn-primary a-btn-slide-text">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span><strong>ADD</strong></span>
            </a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th>Actor ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($actors as $actor)
                            <tr>
                                <td>{{$actor->id}}</td>
                                <td><a href="{{route('actors.show',$actor->id)}}">{{$actor->name}}</a></td>
                                <td align=""><a href="{{ route('actors.edit',$actor->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                {{-- <td align=""><a href="{{ route('actors.destroy',$actor->id) }}"><i class="fa fa-trash-o" style="font-size:24px; color:red" ></a></i></td> --}}
                                <td align="">
                                    {!! Form::open(array('route' => array('actors.destroy', $actor->id),'method'=>'DELETE')) !!}
                                        <button><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
                                    {!! Form::close() !!}
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div>{{$actors->render()}}</div>
        </div>

        @endsection

    </body>

</html>
