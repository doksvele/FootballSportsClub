<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = Post::orderBy('date', 'desc')->get();
    return view('posts.index',compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('posts.create');
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
      'title' => 'required',
      'text' => 'required',
      'author' => 'required',
      'date' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $input = $request->all();
    if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
    }
    Post::create($input);
    return redirect()->route('posts.index')->with('success','Post created successfully.');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function show(Post $post)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function edit(Post $post)
  {
    return view('posts.edit',compact('post'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => 'required',
      'text' => 'required',
      'author' => 'required',
      'date' => 'required',
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
    $post->update($input);
    return redirect()->route('posts.index')->with('success','Post updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('posts.index')->with('success','Post deleted successfully.');
  }
}
