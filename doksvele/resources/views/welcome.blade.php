@extends('layouts.master')
@section('title', 'Home')
@section('menu')
<li><a href="{{ url('/games') }}">MATCHES</a></li>
<li><a href="{{ url('/players') }}">TEAM</a></li>
<li><a href="{{ url('/posts') }}">NEWS</a></li>
<li><a href="{{ url('/pictures') }}">GALLERY</a></li>
@endsection
@section('content')
<div class="main">
  <div>
    <h1>Football Club Name</h1>
    @if (Route::has('login'))
    @auth
    <a href="{{ url('/tickets') }}"><button class="mybtn">BUY A TICKET</button></a>
    @endauth
    @endif
  </div>
</div>
<div class="biography">
  @if (Route::has('login'))
  @auth
  @else
  <h2>TICKETS</h2>
  <hr>
  <p class="paragraph">If you want to buy a ticket for the match, you need to <a href="{{ route('register') }}">REGISTER</a> or <a href="{{ route('login') }}">LOGIN</a> to an existing profile!</p>
  <hr>
  @endauth
  @endif
  <h2>HISTORY</h2>
  <hr>
  <p class="paragraph">Our vision is to help improve the lives of our club and our community through education, development, sports. We are very passionate about our club and want to create a club to be admired by all. We are proud to support the United States Football Academy, a foundation to help develop professional football players and inspire the next generation of America’s finest young athletes. We want to see America’s top footballers recognize that America is the land of opportunity. We want our club to be the poster boy for the development. We hope our club is the catalyst for positive change in our nation’s youth sports program. We are passionate about the sport of football and have been involved in football for over 100 years. We are dedicated to helping to develop the sport and inspire young people. Our aim is to encourage the development of the game in this country and across the globe through grassroots initiatives and community programmes. We are a passionate business with a team of young individuals with an extraordinary work ethic. Our focus is to support football as a whole through a range of commercial, social and technical activities to help raise the game. Our aim is to empower our community through the development of our players and create a strong community of players. Our vision is that we can build a community of young people who are excited by football and who will want to join teams, help develop them and help their families. We have a very loyal community of football fans who are part of the club and are actively involved in the club by volunteering for the cause. We have a lot of international fans who travel to watch us play and have provided a lot of extra funding to keep the club going. We have a lot of special children who have special needs who are supported with the help of the club. We have a huge social media following and a big following on YouTube. We have a strong community who are active on social media and are involved in our club.</p>
  <hr>
</div>
@endsection
