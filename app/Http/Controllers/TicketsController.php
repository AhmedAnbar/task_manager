<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TicketStatusChanged;
use App\Notifications\TicketCreated;
use App\User;
use App\Ticket;

class TicketsController extends Controller
{
    public function __construct() {
      $this->middleware(['role:super_admin|admin']);
    }

    public function index() {
      $tickets = Ticket::where('user_id', auth()->user()->id)->get();;
      $assigned_tickets = Ticket::where('assigned_to', auth()->user()->name)->where('status', '!=', 'pending')->get();

      return view('tickets.index', compact('tickets', 'assigned_tickets'));
    }

    public function create() {
      if(auth()->user()->hasPermission('create-ticket')) {
      $users = User::where('id', '!=', auth()->user()->id)->get();
      return view('tickets.create', compact('users'));
      }
      return back();
    }

    public function store(Request $request) {
      if(auth()->user()->hasPermission('create-ticket')) {
        $this->validate($request, [
          'title' => ['required', 'string', 'max:255'],
          'description' => ['required', 'string',],
          'deadline' => ['required', 'string'],
          'assigned_to' => ['required', 'string', 'max:255'],
          'status' => ['required', 'string', 'max:255'],
        ]);
        $user = User::where('name', $request->assigned_to)->first();
        $request['user_id'] = auth()->user()->id;
        $requestData = $request->all();
        $ticket = Ticket::create($requestData);
        if ($request->status != 'pending') {
          $user->notify(new TicketCreated($ticket));
        }
        
        return redirect()->route('tickets.index');
      }
      dd($request->all());
      return back();
    }

    public function show(Ticket $ticket) {
      return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket) {
      if(auth()->user()->hasPermission('edit-ticket')) {
      $users = User::where('id', '!=', auth()->user()->id)->get();
      return view('tickets.edit', compact('ticket', 'users'));
      }
      return back();
    }

    public function update(Request $request, Ticket $ticket) {
      if (!auth()->user()->hasPermission('edit-ticket')) {
        return back();
      }
      $this->validate($request, [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string',],
        'deadline' => ['required', 'string'],
        'assigned_to' => ['required', 'string', 'max:255'],
        'status' => ['required', 'string', 'max:255'],
      ]);
      $requestData = $request->except('user_id');
      $ticket->update($requestData);
      return redirect()->route('tickets.index');
    }

    public function close(Ticket $ticket) {
      if (auth()->user()->id == $ticket->user_id && auth()->user()->hasPermission('close-ticket')) {
        $ticket->status = 'close';
        $ticket->save();
        $user = User::where('name', $ticket->assigned_to)->first();
        $user->notify(new TicketStatusChanged($ticket));
        return back();
      }
      if (auth()->user()->hasPermission('close-ticket')) {
        $ticket->status = 'close';
        $ticket->save();
        $user = User::where('id', $ticket->user_id)->first();
        $user->notify(new TicketStatusChanged($ticket));
        return back();
      }
      return back();
    }

    public function open(Ticket $ticket) {
      if (auth()->user()->id == $ticket->user_id && auth()->user()->hasPermission('open-ticket')) {
        $ticket->status = 'open';
        $ticket->save();
        $user = User::where('name', $ticket->assigned_to)->first();
        $user->notify(new TicketCreated($ticket));
        return back();
      }
      if (auth()->user()->hasPermission('open-ticket')) {
        $ticket->status = 'open';
        $ticket->save();
        $user = User::where('id', $ticket->user_id)->first();
        $user->notify(new TicketCreated($ticket));
        return back();
      }
      return back();
    }

    public function reopen(Ticket $ticket) {
      if (auth()->user()->id == $ticket->user_id && auth()->user()->hasPermission('reopen-ticket')) {
        $ticket->status = 'reopen';
        $ticket->save();
        $user = User::where('name', $ticket->assigned_to)->first();
        $user->notify(new TicketStatusChanged($ticket));
        return back();
      }
      if (auth()->user()->hasPermission('reopen-ticket')) {
        $ticket->status = 'reopen';
        $ticket->save();
        $user = User::where('id', $ticket->user_id)->first();
        $user->notify(new TicketStatusChanged($ticket));
        return back();
      }
      return back();
    }

    public function destroy(Ticket $ticket) {
      if (!auth()->user()->hasPermission('delete-ticket')) {
        return back();
      }
      $ticket->delete();

      return redirect()->route('tickets.index');
    }
}
