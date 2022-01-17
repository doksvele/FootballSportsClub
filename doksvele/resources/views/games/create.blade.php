@extends('layouts.master')
@section('title', 'Add New Match')
@section('menu')
<li class="active"><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>MATCHES</h1>
  <div class="row">
    <div class="pull-left">
      <h3>ADD NEW MATCH</h3>
    </div>
    <div class="pull-right">
      <a class="button-gray" href="{{ route('games.index') }}">BACK</a>
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
  <form action="{{ route('games.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="form-group">
        <select name="club_id" class="form-control" size="10">
          <option disabled selected>CHOOSE A CLUB</option>
          @foreach ($games as $game)
          <option value="{{ $game->id }}">{{ $game->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <input type="date" name="date" class="form-control" min="1900-01-01" max="2100-01-01">
      </div>
      <div class="form-group">
        <input type="text" name="result" class="form-control" placeholder="RESULT">
      </div>
      <div class="form-group">
        <input type="text" name="place" class="form-control" placeholder="PLACE">
      </div>
      <div class="form-group">
        <input type="text" name="tournament" class="form-control" placeholder="TOURNAMENT">
      </div>
      <div class="form-group">
        <input type="text" name="status" class="form-control" placeholder="STATUS">
      </div>
      <button type="submit" class="button-blue">SUBMIT</button>
    </div>
  </form>
</div>
@endsection
