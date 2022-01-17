@extends('layouts.master')
@section('title', 'Player')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li class="active"><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>{{ $player->name }}</h1>
  <div class="player">
    <div><img src="/image/{{ $player->image }}" alt="person"></div>
    <table>
      <tr>
        <td>NUMBER</td>
        <td>{{ $player->number }}</td>
      </tr>
      <tr>
        <td>POSITION</td>
        <td>{{ $player->position }}</td>
      </tr>
      <tr>
        <td>COUNTRY</td>
        <td>{{ $player->country }}</td>
      </tr>
      <tr>
        <td>DATE OF BIRTH</td>
        <td>{{ $player->dateofbirth }}</td>
      </tr>
      <tr>
        <td>AGE</td>
        <td>{{ $player->age }}</td>
      </tr>
      <tr>
        <td>DEBUT</td>
        <td>{{ $player->debut }}</td>
      </tr>
      <tr>
        <td>GOALS</td>
        <td>{{ $player->goals }}</td>
      </tr>
      <tr>
        <td>ASSISTS</td>
        <td>{{ $player->assists }}</td>
      </tr>
      <tr>
        <td>MATCHES</td>
        <td>{{ $player->matches }}</td>
      </tr>
    </table>
  </div>
</div>
<div class="biography">
  <h2>BIOGRAPHY</h2>
  <hr>
  <p class="paragraph">{{ $player->biography }}</p>
  <hr>
</div>
@endsection
