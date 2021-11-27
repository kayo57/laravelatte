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
</style>
@extends('Layouts.base')<!--views/layouts/baseベース--->
<!----打刻ページ----->
@section('content')
<header class="header">
  <div class="header-ttl">
    <h1>Atte</h1>
  </div>
  <nav class="header-nav">
    <ul class="header-nav_list">
      <li class="header-nav_item">ホーム</li>
      <li class="header-nav_item">日付一覧</li>
      <li class="header-nav_item">ログアウト</li>
    </ul>
  </nav>
</header>
<div class="main">
  <div class="main-item">

    <!----------勤務開始------------>
    <div class="main-item_tag">
      <form action="/" method="POST">
        @csrf
        <input type="submit" name="start_work" value="勤務開始">
        <input type='hidden' id="user_id" name="start_work" value="">
    </div>
    </form>




    <!----------勤務終了------------>
    <p class="main-item_tag">勤務終了</p>
  </div>
  <div class="main-item_second">
    <!----------休憩開始------------>
    <p class="main-item_tag">休憩開始</p>
    <!----------休憩終了------------>
    <p class="main-item_tag">休憩終了</p>
  </div>
  @endsection
  <!----end.打刻ページ----->


  <!--------------打刻ページ/パーツ----------->