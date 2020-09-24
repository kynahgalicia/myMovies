<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Roles</title>
        @extends('layouts.app')
    </head>

    <body>

        @section('content')

        <div class="container">

            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{route('roles.create')}}" class="btn btn-primary a-btn-slide-text">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span><strong>ADD</strong></span>            
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                @endif
            @endauth

            

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>    
                        <th>Role ID</th>
                        <th>Role</th>

                        @auth
                            @if(Auth::user()->is_admin)
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        @endauth
                        
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->roles_id}}</td>
                                <td><a href="{{route('roles.show',$role->roles_id)}}">{{$role->roles}}</a></td>
                                
                                @auth
                                    @if(Auth::user()->is_admin)
                                        <td align="left">
                                            <a href="{{ route('roles.edit',$role->roles_id) }}"> 
                                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
                                        <td align="left">
                                            {!! Form::open(array('route' => array('roles.destroy', $role->roles_id),'method'=>'DELETE')) !!}
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
            <div>{{$roles->links()}}</div>

        </div>

        @endsection

    </body>

</html>