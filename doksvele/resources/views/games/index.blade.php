@extends('layouts.master')
@section('title', 'Matches')
@section('menu')
<li class="active"><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>MATCHES</h1>
  @if (Route::has('login'))
  @auth
  <a class="button-green" href="{{ route('games.create') }}">ADD NEW MATCH</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @endauth
  @endif
  @foreach ($games as $game)
  <table>
    <caption>
      @if (Route::has('login'))
      @auth
      {{ $game->id }} -
      @endauth
      @endif
      {{ $game->status }}
    </caption>
    <tr><td colspan="1">{{ $game->date }}</td><td colspan="2" class="right">{{ $game->tournament }}</td></tr>
    <tr>
      <td><img src="{{ asset('img/lv.svg') }}" alt="latvia"><h3>Latvia</h3></td>
      <td><h2>{{ $game->result }}</h2>{{ $game->place }}</td>
      <td><img src="/image/{{ $game->image }}" alt="image"><h3>{{ $game->name }}</h3></td>
    </tr>
  </table>
  @endforeach
</div>
@endsection
