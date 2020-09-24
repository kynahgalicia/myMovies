<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Genres</title>
        @extends('layouts.app')
    </head>

    <body>

        @section('content')

        <div class="container">

            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{route('genres.create')}}" class="btn btn-primary a-btn-slide-text">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span><strong>ADD</strong></span>            
                    </a>
                @endif

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

            @endauth

            

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>    
                        <th>Genre ID</th>
                        <th>Genre</th>

                        @auth
                            @if(Auth::user()->is_admin)
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        @endauth
                        
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($genres as $genre)
                            <tr>
                                <td>{{$genre->genres_id}}</td>
                                <td><a href="{{route('genres.show',$genre->genres_id)}}">{{$genre->genre}}</a></td>
                                
                                @auth
                                    @if(Auth::user()->is_admin)
                                        <td align="left"><a href="{{ route('genres.edit',$genre->genres_id) }}"> 
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                        <td align="left">
                                            {!! Form::open(array('route' => array('genres.destroy', $genre->genres_id),'method'=>'DELETE')) !!}
                                                <button><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                @endauth
                                
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div>{{$genres->links()}}</div>

        </div>

        @endsection

    </body>

</html>