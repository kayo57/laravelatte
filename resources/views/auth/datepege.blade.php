<!---------日付ページ一覧---------->

@extends('Layouts.base')
@section('datepege')
<header>
  <h1>Atte</h1>
  <nav class="header">
    <li class="nav"><a href="/">ホーム</a></li>
    <li class="nav"><a href="/date">日付別一覧ページ</a></li>
    <li class="nav"><a href="/index">勤怠打刻ページ</a></li>
    <li class="nav"><a href="/">ログアウト</a></li>
  </nav>
</header>

<main>


  <form action="/date" method="POST">
    @csrf
    @method('post')
    <div>
      <h2>勤怠日付別一覧ページ</h2>
    </div>
    <div class="date">


      <div>本日の日付{{ date('Y-m-d')}}</div>


      <label for="date" class="mr-2 ">
        日付を選択して下さい
      </label>
      <input type="date" name="date" id="date">
      <button type="submit" class="search" value="">検索</button>

  </form>
  </div>


  <h2 class="">{{$date}}勤務一覧を表示</h2>


  <table>
    <thead>
      <tr>
        <th class="table-title">名前</th>
        <th class="table-title">勤務開始</th>
        <th class="table-title">勤務終了</th>
        <th class="table-title">休憩時間</th>
        <th class="table-title">勤務時間</th>
      </tr>
    </thead>


    <tbody>
      @foreach($users as $user)
      <tr>
        <td class="table-item">{{$user->user->name}}</td>
        <td class="table-item">{{$user->start_work}}</td>
        <td class="table-item">{{$user->end_work}}</td>


        <td class="table-item">{{$hours}}:{{$minutes}}:{{$seconds}}</td>


        <td class="table-item">{{ gmdate("H:i:s",(strtotime($user->end_work)-strtotime($user->start_work))) }}</td>


      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $items->links() }}
  <div class="elsebody">
    <div class="elseabout">
      <p class="elsep">ゲストさん</p>
      <a href="/register" class="elsea">会員登録</a>
    </div>

  </div>
</main>