@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="pt-2 pr-2">
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
                  <p class="h1">{{$ticket->title}}</p>
                  @if(auth()->user()->id == $ticket->user_id)
                  @permission('edit-ticket')
                  @if($ticket->status != 'close')
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                  @endif
                  @endpermission
                  @endif
                  <a href="{{ route('tickets.destroy', $ticket->id) }}" class="btn btn-danger btn-sm"
                     onclick="event.preventDefault();
                                   document.getElementById('delete-form').submit();">
                      Delete
                  </a>
                  <form id="delete-form" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                  </form>
                  <hr>
                  <blockquote class="blockquote float-left">
                    <p class="mb-0">{{$ticket->description}}</p>
                    <footer class="blockquote-footer">Created By: <cite title="Source Title">{{$ticket->user->name}}</cite></footer>
                    <footer class="blockquote-footer">Assigned To: <cite title="Source Title">{{$ticket->assigned_to}}</cite></footer>
                  </blockquote>

                  <p class="float-right">Deadline: {{$ticket->deadline}}</p>

              </div>
              <div class="card-footer">
                @if($ticket->status == 'pending')
                @permission('open-ticket')
                  <a href="{{route('tickets.open', $ticket->id)}}" class="btn btn-success">Open This Ticket</a>
                @endpermission
                @elseif($ticket->status == 'open' || $ticket->status == 'reopen')
                @permission('close-ticket')
                  <a href="{{route('tickets.close', $ticket->id)}}" class="btn btn-danger">Close This Ticket</a>
                @endpermission
                @elseif($ticket->status == 'close')
                @permission('reopen-ticket')
                  <a href="{{route('tickets.reopen', $ticket->id)}}" class="btn btn-info">Reopen This Ticket</a>
                @endpermission
                @endif                
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
