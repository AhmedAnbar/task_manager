@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$user->name}} Data</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="{{$user->email}}" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <h5>Roles</h5>
                            @foreach($roles as $role)
                            <div class="form-check">
                              <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->name}}" id="{{$role->name}}" {{$user->hasRole($role->name) ? 'checked' : ''}}>
                              <label class="form-check-label" for="{{$role->name}}">
                                {{$role->display_name}}
                              </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h5>Permissions</h5>
                            @foreach($permissions as $permission)
                            <div class="form-check">
                              <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="{{$permission->name}}" {{$user->hasPermission($permission->name) ? 'checked' : ''}}>
                              <label class="form-check-label" for="{{$permission->name}}">
                                {{$permission->display_name}}
                              </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
