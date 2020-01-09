@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Ticket</div>

                <div class="card-body">
                     <form method="POST" action="{{ route('tickets.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input class="form-control" name="deadline" type="date"/>
                        </div>
                        <div class="form-group">
                            <label for="assigned_to">Assigne Ticket To</label>
                            <select class="form-control" name="assigned_to">
                                @foreach($users as $user)
                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="pending">Pending</option>
                                <option value="open">Open</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
