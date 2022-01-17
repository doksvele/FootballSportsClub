@extends('layouts.master')
@section('title', 'Edit Post')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li class="active"><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>NEWS</h1>
  <div class="row">
    <div class="pull-left">
      <h3>EDIT POST</h3>
    </div>
    <div class="pull-right">
      <a class="button-gray" href="{{ route('posts.index') }}">BACK</a>
    </div>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </div>
  @endif
  <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="form-group">
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="TITLE">
      </div>
      <div class="form-group">
        <textarea name="text" class="form-control" placeholder="TEXT">{{ $post->text }}</textarea>
      </div>
      <div class="form-group">
        <input type="text" name="author" value="{{ $post->author }}" class="form-control" placeholder="AUTHOR">
      </div>
      <div class="form-group">
        <input type="date" name="date" value="{{ $post->date }}" class="form-control" min="1900-01-01" max="2100-01-01">
      </div>
      <div class="form-group">
        <input type="file" name="image" class="form-control">
        <img src="/image/{{ $post->image }}" width="300px">
      </div>
      <button type="submit" class="button-blue">SUBMIT</button>
    </div>
  </form>
</div>
@endsection
