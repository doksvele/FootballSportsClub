@extends('layouts.master')
@section('title', 'News')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li class="active"><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="container">
  <h1>NEWS</h1>
  @if (Route::has('login'))
  @auth
  <a class="button-green" href="{{ route('posts.create') }}">ADD NEW POST</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @endauth
  @endif
  <ul class="news">
    @foreach ($posts as $post)
    <li>
      <div class="overlay"></div>
      <div class="info">
        <h2>{{ $post->title }}</h2>
        <a href="#" class="more">READ MORE</a>
        <div class="description">
          <p class="paragraph">{{ $post->text }}</p>
          <div>
            <p>by {{ $post->author }}</p>
            <p>{{ $post->date }}</p>
          </div>
        </div>
        @if (Route::has('login'))
        @auth
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
          <a class="button-yellow" href="{{ route('posts.edit',$post->id) }}">EDIT</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="button-red">DELETE</button>
        </form>
        @endauth
        @endif
      </div>
      <div class="bg-img"><img src="/image/{{ $post->image }}"></div>
    </li>
    @endforeach
  </ul>
</div>
@endsection
