<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $tickets = Ticket::join('games', 'games.id', '=', 'tickets.game_id')->join('clubs', 'clubs.id', '=', 'games.club_id')->orderBy('date')->get(['tickets.*', 'games.*', 'clubs.*']);
    return view('tickets.index',compact('tickets'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $tickets = Ticket::rightJoin('games', 'games.id', '=', 'tickets.game_id')->distinct()->where('games.status', 'The match will be')->orderBy('id')->get(['games.*']);
    return view('tickets.create',compact('tickets'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $request->validate([
      'game_id' => 'required',
      'price' => 'required',
      'quantity' => 'required',
      'description' => 'required',
    ]);
    Ticket::create($request->all());
    return redirect()->route('tickets.index')->with('success','Ticket created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Ticket  $ticket
  * @return \Illuminate\Http\Response
  */
  public function show(Ticket $ticket)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Ticket  $ticket
  * @return \Illuminate\Http\Response
  */
  public function edit(Ticket $ticket)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Ticket  $ticket
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Ticket $ticket)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Ticket  $ticket
  * @return \Illuminate\Http\Response
  */
  public function destroy(Ticket $ticket)
  {
    //
  }
}
