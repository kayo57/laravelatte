<!---------打刻ページ/パーツ----1------->

<style>
  .header {
    background: #F0FFF0;
  }

  .header-ttl {
    padding-left: 20px;
  }

  .header-nav {
    display: block;
  }

  .header-nav_list {
    display: flex;
    justify-content: flex-end;
    list-style: none;
  }

  .header-nav_item {
    padding-right: 15px;
  }

  .main {
    background: #F5FFFA;
    height: 500px;
    font-size: 20px;
  }

  .main-item {
    display: flex;
    justify-content: center;
  }

  .main-item_second {
    display: flex;
    justify-content: center;

  }

  .main-item_tag {
    padding-left: 80px;
  }

  .main-item_second {
    padding-left: 80px;
  }
</style>
@extends('Layouts.base')
<!--views/layouts/baseベース--->
<!----打刻ページ----->
@section('content')
<header class="header">
  <div class="header-ttl">
    <h1>Atte</h1>

  </div>
  <nav class="header-nav">
    <ul class="header-nav_list">
      <li class="header-nav_item"><a herf="/">ホーム</li>
      <li class="header-nav_item"><a herf="">日付一覧</li>
      <li class="header-nav_item"><a herf="">ログアウト</li>
    </ul>
  </nav>
</header>
<div class="main">
  <p class="">{{ Auth::user()->name}}さんお疲れ様です！</p>


  <div class="main-item">
    <!----------勤務開始------------>
    <div class="main-item_tag">
      <form action="/start" method="POST">
        @csrf
        <button type="submit" class="btn btn-start">勤務開始</button>
        <input type='hidden' id="user_id" name="start_work" value="{{'start_work'}}">
    </div>
    @if(session('start_in'))
    <div class="alert alert-succes">
      {{session('start_in')}}
    </div>
    @endif
</form>


    <!----------勤務終了------------>
    <div class="main-item_tag">
      <form action="/end" method="POST">
        @csrf
        <button type="submit" class="btn btn-end">勤務終了</button>
        <input type='hidden' id="user_id" name="end_work" value="{{'end_work'}}">
    </div>
    </form>
  </div>
  <!---end.main-iteme---->



  <div class="main-item">
    <!----------休憩開始------------>
    <div class="main-item_second">
      <form action="/rest" method="POST">
        @csrf
        <button type="submit" class="btn btn-start">休憩開始</button>
        <input type='hidden' id="user_id" name="start_break" value="{{'start_break'}}">
    </div>
    </form>



    <!----------休憩終了------------>
    <div class="main-item_second">
      <form action="/break" method="POST">
        @csrf
        <button type="submit" class="btn btn-end">休憩開始</button>
        <input type='hidden' id="user_id" name="end_break" value="{{'end_break'}}">
    </div>
    </form>
  </div>
  @endsection
  <!----end.打刻ページ----->


  <!--------------打刻ページ/パーツ----------->