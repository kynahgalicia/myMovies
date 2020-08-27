<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        @extends('layouts.app')
    </head>

    <body>
        @section('body')

        <div class="container">

            <a href="{{route('movies.create')}}" class="btn btn-primary a-btn-slide-text">
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
                        <th>Movies ID</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{$movie->id}}</td>
                                <td><a href="{{route('movies.show',$movie->id)}}">{{$movie->title}}</a></td>
                                <td align="left"><a href="{{ route('movies.edit',$movie->id) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                {{-- <td align="left"><a href="{{ route('movies.destroy',$movie->id) }}"> <i class="fa fa-trash-o" style="font-size:24px; color:red"></a></i></td> --}}

                                <td align="center">
                                    {!! Form::open(array('route' => array('movies.destroy', $movie->id),'method'=>'DELETE')) !!}
                                        <button><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
                                    {!! Form::close() !!}

                                {{-- {{ Form::open(array('route' => 'movies.destroy' . $movies->id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete this Movies', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }} --}}
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div>{{$movies->links()}}</div>
            {{-- <div>{!! $movies->render() !!}</div> --}}

        </div>

        @endsection

    </body>

</html>