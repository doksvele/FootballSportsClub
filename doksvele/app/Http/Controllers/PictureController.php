<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pictures = Picture::all();
    return view('pictures.index',compact('pictures'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('pictures.create');
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
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $input = $request->all();
    if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
    }
    Picture::create($input);
    return redirect()->route('pictures.index')->with('success','Picture created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Picture  $picture
  * @return \Illuminate\Http\Response
  */
  public function show(Picture $picture)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Picture  $picture
  * @return \Illuminate\Http\Response
  */
  public function edit(Picture $picture)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Picture  $picture
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Picture $picture)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Picture  $picture
  * @return \Illuminate\Http\Response
  */
  public function destroy(Picture $picture)
  {
    $picture->delete();
    return redirect()->route('pictures.index')->with('success','Picture deleted successfully.');
  }
}
