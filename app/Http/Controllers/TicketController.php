<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use File;
use Storage;

class TicketController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->keyword){
            //search by title   
           $user = auth()->user();
           $tickets = $user->tickets()
               ->where('title','LIKE','%'.$request->keyword.'%')
               ->orWhere('description','LIKE','%'.$request->keyword.'%')
               ->paginate(3);
        }else{
           // query all ticket from 'tickets' table to $tickets
           // select * from tickets - SQL Query
           //$tickets = Ticket::all();
           $user = auth()->user();
           $tickets = $user->tickets()->paginate(3);   
       }
       
       // return to view with $tickets
       // resources/views/tickets/index.blade.php
       return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->attachment = $request->attachment;
        $ticket->user_id = auth()->user()->id;
        $ticket->save();

        if($request->hasFile('attachment')){
            // rename file
            $filename = $ticket->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

            //store attachment on storage
            Storage::disk('public')->put($filename, File::get($request->attachment));

            // update row
            $ticket->attachment = $filename;
            $ticket->save();
        }

        //return to index
        return redirect()->route('ticket:index')->with([
            'alert-type' => 'alert-primary',
            'alert' => 'Your ticket has been saved!'
        ]);
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Ticket $ticket, Request $request)
    {
        // update $ticket using input from edit form
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->attachment = $request->attachment;
        $ticket->save();

        // redirect to ticket index
        return redirect()->route('ticket:index')->with([
            'alert-type' => 'alert-success',
            'alert' => 'Your ticket has been updated!'
        ]);
    }

    public function destroy(Ticket $ticket)
    {
        if($ticket->attachment){
            Storage::disk('public')->delete($ticket->attachment);
        }

        //delete $ticket from db
        $ticket->delete();

        // return to ticket index
        return redirect()->route('ticket:index')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'Your ticket has been deleted!'
        ]);
    }

    public function forceDestroy(Ticket $ticket)
    {
        $ticket->forceDelete();

        return redirect()->route('ticket:index')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'Your ticket has been force deleted!'
        ]);
    }
}
