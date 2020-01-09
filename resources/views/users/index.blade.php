@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users List<span class="float-right">
                    @role('admin')
                    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">Create User</a>
                    @endrole
                </span></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption>All application users</caption>
                                <thead>
                                    <tr>
                                        <th>index</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index=>$user)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $index=>$role)
                                                {{$role->display_name}}{{$index+1 < $user->roles->count() ? ',' : ''}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($user->permissions->count() > 0)
                                                @foreach($user->permissions as $index=>$permission)
                                                    {{$permission->display_name}}{{$index+1 < $user->permissions->count() ? ',' : ''}}
                                                @endforeach
                                            @else
                                            No Permissions
                                            @endif
                                        </td>
                                        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
