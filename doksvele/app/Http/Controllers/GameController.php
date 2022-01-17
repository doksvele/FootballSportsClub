<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $games = Game::join('clubs', 'clubs.id', '=', 'games.club_id')->orderBy('date', 'desc')->get(['games.*', 'clubs.name', 'clubs.image']);
    return view('games.index',compact('games'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $games = Game::rightJoin('clubs', 'clubs.id', '=', 'games.club_id')->distinct()->orderBy('name')->get(['clubs.*']);
    return view('games.create',compact('games'));
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
      'club_id' => 'required',
      'date' => 'required',
      'result' => 'required',
      'place' => 'required',
      'tournament' => 'required',
      'status' => 'required',
    ]);
    Game::create($request->all());
    return redirect()->route('games.index')->with('success','Game created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Game  $game
  * @return \Illuminate\Http\Response
  */
  public function show(Game $game)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Game  $game
  * @return \Illuminate\Http\Response
  */
  public function edit(Game $game)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Game  $game
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Game $game)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Game  $game
  * @return \Illuminate\Http\Response
  */
  public function destroy(Game $game)
  {
    //
  }
}
