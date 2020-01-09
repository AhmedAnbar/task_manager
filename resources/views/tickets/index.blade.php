@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tickets Created By Me<span class="badge badge-primary">{{$tickets->count()}}</span>
                    @permission('create-ticket')
                    <span class="float-right">
                    <a href="{{route('tickets.create')}}" class="btn btn-primary btn-sm">Create Ticket</a>
                    </span>
                    @endpermission
                </div>

                <div class="card-body">
                    @if($tickets->count() > 0)
                        <div class="row text-center">
                            @foreach($tickets as $ticket)
                            <div class="col-4">
                                <a href="{{route('tickets.show', $ticket->id)}}">
                                  <div class="card mt-2">
                                    <div class="card-header">
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
                                      <div class="card-body" style="text-decoration: none; color: #000;">
                                          {{$ticket->title}}
                                      </div>
                                  </div>
                              </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        You are not yet created any tickets.
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tickets Assigned To Me<span class="badge badge-primary">{{$assigned_tickets->count()}}</span></div>

                <div class="card-body">
                    @if($assigned_tickets->count() > 0)
                        <div class="row text-center">
                            @foreach($assigned_tickets as $ticket)
                            <div class="col-4">
                                <a href="{{route('tickets.show', $ticket->id)}}">
                                  <div class="card mt-2">
                                    <div class="card-header">
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
                                      <div class="card-body" style="text-decoration: none; color: #000;">
                                          {{$ticket->title}}
                                      </div>
                                  </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        No Tickets Assigned To You.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
