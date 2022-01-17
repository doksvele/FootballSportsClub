@extends('layouts.master')
@section('title', 'Gallery')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li class="active"><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>GALLERY</h1>
  @if (Route::has('login'))
  @auth
  <a class="button-green" href="{{ route('pictures.create') }}">ADD NEW PICTURE</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @endauth
  @endif
  <div class="gallery">
    @foreach ($pictures as $picture)
    <div class="grid">
      <img src="/image/{{ $picture->image }}" alt="photo">
      @if (Route::has('login'))
      @auth
      <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="button-red">DELETE</button>
      </form>
      @endauth
      @endif
    </div>
    @endforeach
  </div>
</div>
@endsection
