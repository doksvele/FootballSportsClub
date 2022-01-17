@extends('layouts.master')
@section('title', 'Add New Player')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li class="active"><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>TEAM</h1>
  <div class="row">
    <div class="pull-left">
      <h3>ADD NEW PLAYER</h3>
    </div>
    <div class="pull-right">
      <a class="button-gray" href="{{ route('players.index') }}">BACK</a>
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
  <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="NAME">
      </div>
      <div class="form-group">
        <input type="number" name="number" class="form-control" placeholder="NUMBER" min="0" max="255">
      </div>
      <div class="form-group">
        <input type="text" name="position" class="form-control" placeholder="POSITION">
      </div>
      <div class="form-group">
        <input type="text" name="country" class="form-control" placeholder="COUNTRY">
      </div>
      <div class="form-group">
        <input type="date" name="dateofbirth" class="form-control" min="1900-01-01" max="2100-01-01">
      </div>
      <div class="form-group">
        <input type="number" name="age" class="form-control" placeholder="AGE" min="0" max="255">
      </div>
      <div class="form-group">
        <input type="date" name="debut" class="form-control" min="1900-01-01" max="2100-01-01">
      </div>
      <div class="form-group">
        <input type="number" name="goals" class="form-control" placeholder="GOALS" min="0" max="30000">
      </div>
      <div class="form-group">
        <input type="number" name="assists" class="form-control" placeholder="ASSISTS" min="0" max="30000">
      </div>
      <div class="form-group">
        <input type="number" name="matches" class="form-control" placeholder="MATCHES" min="0" max="30000">
      </div>
      <div class="form-group">
        <textarea name="biography" class="form-control" placeholder="BIOGRAPHY"></textarea>
      </div>
      <div class="form-group">
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" class="button-blue">SUBMIT</button>
    </div>
  </form>
</div>
@endsection
