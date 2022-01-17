<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Football Club - @yield('title')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ url('favicon.ico') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          @yield('menu')
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if (Route::has('login'))
          @auth
          <li><a href="{{ url('/dashboard') }}">MY PROFILE</a></li>
          @else
          <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> REGISTER</a></li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  <div class="footer-basic">
    <footer>
      <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook"></a>
      <a href="https://twitter.com/" target="_blank" class="fa fa-twitter"></a>
      <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube"></a>
      <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="{{ url('/') }}">HOME</a></li>
        <li class="list-inline-item"><a href="{{ url('/games') }}">MATCHES</a></li>
        <li class="list-inline-item"><a href="{{ url('/players') }}">TEAM</a></li>
        <li class="list-inline-item"><a href="{{ url('/posts') }}">NEWS</a></li>
        <li class="list-inline-item"><a href="{{ url('/pictures') }}">GALLERY</a></li>
      </ul>
      <div class="footermybtn">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}"><button class="mybtn">MY PROFILE</button></a>
        @else
        <a href="{{ route('login') }}"><button class="mybtn">LOGIN</button></a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}"><button class="mybtn">REGISTER</button></a>
        @endif
        @endauth
        @endif
      </div>
      <p class="copyright">Football Club Name © 2021</p>
    </footer>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
