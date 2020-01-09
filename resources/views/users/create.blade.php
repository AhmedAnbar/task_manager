@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-Mail">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <h5>Roles</h5>
                            @foreach($roles as $role)
                            <div class="form-check">
                              <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->name}}" id="{{$role->name}}">
                              <label class="form-check-label" for="{{$role->name}}">
                                {{$role->display_name}}
                              </label>
                            </div>
                            @endforeach
                        </div>
                        @role('admin')
                        <div class="form-group">
                            <h5>Permissions</h5>
                            @foreach($permissions as $permission)
                            <div class="form-check">
                              <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="{{$permission->name}}">
                              <label class="form-check-label" for="{{$permission->name}}">
                                {{$permission->display_name}}
                              </label>
                            </div>
                            @endforeach
                        </div>
                        @endrole
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
