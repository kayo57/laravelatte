<!---------日付ページ一覧---------->
<style></style>

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

  <div class="">
    <tr>
      <th>名前</th>
      <th>勤務開始</th>
      <th>勤務終了</th>
      <th>休憩時間</th>
      <th>勤務時間</th>
    </tr>
  </div>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->start_work}}</td>
      <td>{{$user->end_work}}</td>
      <td>{{$user->start_rest}}</td>
      <td>{{$user->end_rest}}</td>
    </tr>
    @endforeach
  </tbody>
  {{$users->links()}}