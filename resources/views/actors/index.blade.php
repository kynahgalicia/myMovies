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

            @auth

                @if(Auth::user()->is_admin)
                    <a href="{{route('actors.create')}}" class="btn btn-primary a-btn-slide-text">
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
                        <th>Actor ID</th>
                        <th>Name</th>

                        @auth
                            @if(Auth::user()->is_admin)
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Restore</th>
                            @endif
                        @endauth

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($actors as $actor)
                            <tr>
                                <td>{{$actor->actors_id}}</td>
                                <td><a href="{{route('actors.show',$actor->actors_id)}}">{{$actor->name}}</a></td>

                                @auth
                                    @if(Auth::user()->is_admin)
                                        <td align=""><a href="{{ route('actors.edit',$actor->actors_id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                        {{-- <td align=""><a href="{{ route('actors.destroy',$actor->id) }}"><i class="fa fa-trash-o" style="font-size:24px; color:red" ></a></i></td> --}}
                                        <td align="">
                                            {!! Form::open(array('route' => array('actors.destroy', $actor->actors_id),'method'=>'DELETE')) !!}
                                                <button><i class="fa fa-trash-o" style="font-size:24px; color:red" ></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td align="left"><a href="{{ route('actors.restore',$actor->actors_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:green" ></i></a></td>
                                    @endif
                                @endauth
                                
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
