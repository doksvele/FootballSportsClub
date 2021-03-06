<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $clubs = Club::orderBy('name')->paginate(20);
    return view('clubs.index',compact('clubs'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('clubs.create');
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
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $input = $request->all();
    if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
    }
    Club::create($input);
    return redirect()->route('clubs.index')->with('success','Club created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Club  $club
  * @return \Illuminate\Http\Response
  */
  public function show(Club $club)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Club  $club
  * @return \Illuminate\Http\Response
  */
  public function edit(Club $club)
  {
    return view('clubs.edit',compact('club'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Club  $club
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Club $club)
  {
    $request->validate([
      'name' => 'required',
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
    $club->update($input);
    return redirect()->route('clubs.index')->with('success','Club updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Club  $club
  * @return \Illuminate\Http\Response
  */
  public function destroy(Club $club)
  {
    $club->delete();
    return redirect()->route('clubs.index')->with('success','Club deleted successfully.');
  }
}
