<!---------打刻ページ/パーツ----1------->


@extends('Layouts.base')
<!--views/layouts/baseベース--->
<!----打刻ページ----->
@section('content')

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
  @if (Auth::check())

  <h2>{{ Auth::user()->name}}さんお疲れ様です！</h2>
  <p class="message">{{ session('message') }}</p>


  <div class="buttons">
    <!----------勤務開始------------>
    <div>
      <form action="/start" method="POST">
        @csrf

        <button type="submit" class="stamp">勤務開始</button>
        <input type='hidden' id="user_id" name="start_work" value="{{'start_work'}}">


        @if(session('start_in'))
        <div class="alert alert-succes">
          {{session('start_in')}}
        </div>
        @endif
      </form>
    </div>


    <!----------勤務終了------------>
    <div>
      <form action="/end" method="POST">
        @csrf
        <button type="submit" class="stamp">勤務終了</button>
        <input type='hidden' id="user_id" name="end_work" value="{{'end_work'}}">
      </form>
    </div>
    <!---end.main-iteme---->



    <!----------休憩開始------------>
    <div>
      <form action="/reststart" method="POST">
        @csrf
        <button type="submit" class="stamp">休憩開始</button>
        <input type='hidden' id="stamp_id" name="start_rest" value="{{'start_rest'}}">
      </form>
    </div>



    <!----------休憩終了------------>
    <div>
      <form action="/restend" method="POST">
        @csrf
        <button type="submit" class="stamp">休憩終了</button>
        <input type='hidden' id="stamp_id" name="end_rest" value="{{'end_rest'}}">
      </form>
    </div>
  </div>
  @else
  <div class="elsebody">
    <div class="elseabout">
      <p class="elsep">ゲストさん</p>
      <a href="/register" class="elsea">会員登録</a>
    </div>
  </div>
  @endif
</main>
@endsection
<!----end.打刻ページ----->


<!--------------打刻ページ/パーツ----------->