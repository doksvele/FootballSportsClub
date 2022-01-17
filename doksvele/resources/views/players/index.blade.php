@extends('layouts.master')
@section('title', 'Team')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li class="active"><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>TEAM</h1>
  @if (Route::has('login'))
  @auth
  <a class="button-green" href="{{ route('players.create') }}">ADD NEW PLAYER</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @endauth
  @endif
  <div class="team">
    @foreach ($players as $player)
    <div class="person">
      <a href="{{ route('players.show',$player->id) }}">
        <div class="human">
          <img src="/image/{{ $player->image }}" alt="person">
          <div class="top"><h1>{{ $player->number }}</h1></div>
          <div class="bottom">
            <h3>{{ $player->name }}</h3>
            <p>{{ $player->position }}</p>
          </div>
        </div>
      </a>
      @if (Route::has('login'))
      @auth
      <form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        <a class="button-yellow" href="{{ route('players.edit',$player->id) }}">EDIT</a>
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
