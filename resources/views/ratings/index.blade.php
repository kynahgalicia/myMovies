<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Ratings</title>
        @extends('layouts.app')
    </head>

    <body>

        @section('content')

        <div class="container">

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
                        <th>Movie Title</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        @auth
                            @if (Auth::user()->is_admin)
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                            
                        @endauth
                        
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($ratings as $rating)
                            <tr>
                                <td>{{$rating->movies->title}}</td>
                                <td>{{$rating->users->name}}</td>
                                <td>{{$rating->rating}}</td>
                                <td>{{$rating->comment}}</td>
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <td align="left">
                                            <a href="{{ route('ratings.edit',$rating->ratings_id) }}"> 
                                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                        <td align="left">
                                            {!! Form::open(array('route' => array('ratings.destroy', $rating->ratings_id),'method'=>'DELETE')) !!}
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

            {{-- PAGINATION --}}
            <div>{{$ratings->links()}}</div>

        </div>

        @endsection

    </body>

</html>