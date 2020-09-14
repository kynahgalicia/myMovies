<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Producers</title>
        @extends('layouts.app')
    </head>

    <body>

        @section('content')

        <div class="container">

            <a href="{{route('producers.create')}}" class="btn btn-primary a-btn-slide-text">
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
                        <th>Producers ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($producers as $producer)
                            <tr>
                                <td>{{$producer->producers_id}}</td>
                                <td><a href="{{route('producers.show',$producer->producers_id)}}">{{$producer->name}}</a></td>
                                <td align="left"><a href="{{ route('producers.edit',$producer->producers_id) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                <td align="left">
                                    {!! Form::open(array('route' => array('producers.destroy', $producer->producers_id),'method'=>'DELETE')) !!}
                                        <button><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
                                    {!! Form::close() !!}
                                </td>
                                    
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div>{{$producers->links()}}</div>

        </div>

        @endsection

    </body>

</html>