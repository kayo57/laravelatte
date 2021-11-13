<!---パーツ---->

<style>
.header {
  background: #F0FFF0;
  display: ;
}

.header-ttl {}

.header-nav_list {
  display: flex;
  justify-content: flex-end;
  list-style: none;
}
</style>
@extends('Layouts.app')
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
    <p class="main-item_tag">勤務開始</p>
    <p class="main-item_tag">勤務終了</p>
    <p class="main-item_tag">休憩開始</p>
    <p class="main-item_tag">休憩終了</p>
  </div>
  @endsection
  <!----end.打刻ページ----->