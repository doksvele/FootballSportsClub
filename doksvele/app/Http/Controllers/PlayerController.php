<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $players = Player::orderBy('number')->get();
    return view('players.index',compact('players'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('players.create');
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
      'name' => 'required',
      'number' => 'required',
      'position' => 'required',
      'country' => 'required',
      'dateofbirth' => 'required',
      'age' => 'required',
      'debut' => 'required',
      'goals' => 'required',
      'assists' => 'required',
      'matches' => 'required',
      'biography' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $input = $request->all();
    if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
    }
    Player::create($input);
    return redirect()->route('players.index')->with('success','Player created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Player  $player
  * @return \Illuminate\Http\Response
  */
  public function show(Player $player)
  {
    return view('players.show',compact('player'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Player  $player
  * @return \Illuminate\Http\Response
  */
  public function edit(Player $player)
  {
    return view('players.edit',compact('player'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Player  $player
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Player $player)
  {
    $request->validate([
      'name' => 'required',
      'number' => 'required',
      'position' => 'required',
      'country' => 'required',
      'dateofbirth' => 'required',
      'age' => 'required',
      'debut' => 'required',
      'goals' => 'required',
      'assists' => 'required',
      'matches' => 'required',
      'biography' => 'required',
    ]);
    $input = $request->all();
    if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
    }else{
      unset($input['image']);
    }
    $player->update($input);
    return redirect()->route('players.index')->with('success','Player updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Player  $player
  * @return \Illuminate\Http\Response
  */
  public function destroy(Player $player)
  {
    $player->delete();
    return redirect()->route('players.index')->with('success','Player deleted successfully.');
  }
}
