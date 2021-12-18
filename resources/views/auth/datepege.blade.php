<!---------日付ページ一覧---------->
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

  .text-ttl {
    font-weight: bold;
    text-align: center;
    margin: 0 auto;
  }

  .text-name {}
</style>

@extends('Layouts.base')
@section('datepege')
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

<form action="/date" method="POST">
  @csrf
  <div class="date">
    <p>日付</p>
    <div>{{date('Y-m-d')}}</div>
  </div>

  <div>{{$date}}の勤務一覧</div>



  <div class="text-ttl">
    <tr>
      <th class="text-name">名前</th>
      <th class="text-name">勤務開始</th>
      <th class="text-name">勤務終了</th>
      <th class="text-name">休憩時間</th>
      <th class="text-name">勤務時間</th>
    </tr>
  </div>

  <tbody>
    @foreach($users as $user)
    <tr>
      <td class="text">{{$user->user->name}}</td>
      <td class="text">{{$user->start_work}}</td>
      <td class="text">{{$user->end_work}}</td>
      <td></td>
      <td>{{$user->stamp_date}}</td>
    </tr>
    @endforeach
    
    {{ $items->links() }}
    
  </tbody>