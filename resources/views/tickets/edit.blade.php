@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit {{$ticket->title}} Ticket
                    @if($ticket->status == 'pending')
                      <span class="badge badge-warning float-right">Pending</span>
                    @elseif($ticket->status == 'open')
                      <span class="badge badge-success float-right">Open</span>
                    @elseif($ticket->status == 'reopen')
                      <span class="badge badge-success float-right">Reopened</span>
                    @elseif($ticket->status == 'close')
                      <span class="badge badge-danger float-right">Closed</span>
                    @endif
                </div>

                <div class="card-body">
                     <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" value="{{$ticket->title}}" name="title" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea class="form-control" name="description">{{$ticket->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input class="form-control" value="{{$ticket->deadline}}" name="deadline" type="date"/>
                        </div>
                        <div class="form-group">
                            <label for="assigned_to">Assigne Ticket To</label>
                            <select class="form-control" name="assigned_to">
                                @foreach($users as $user)
                                    <option {{$ticket->user_id == $user->id ? 'selected' : ''}} value="{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="pending" {{$ticket->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="open" {{$ticket->status == 'open' ? 'selected' : ''}}>Open</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
