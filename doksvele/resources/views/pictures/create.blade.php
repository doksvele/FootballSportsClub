@extends('layouts.master')
@section('title', 'Add New Picture')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li class="active"><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>GALLERY</h1>
  <div class="row">
    <div class="pull-left">
      <h3>ADD NEW PICTURE</h3>
    </div>
    <div class="pull-right">
      <a class="button-gray" href="{{ route('pictures.index') }}">BACK</a>
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
  <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="form-group">
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" class="button-blue">SUBMIT</button>
    </div>
  </form>
</div>
@endsection
