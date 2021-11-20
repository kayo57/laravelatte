<!-----会員登録ページ------>
@extends('Layouts.app')
@section('register')
<div class="register">
  <header class="header">
    <div class="header-ttl">
      <h1>Atte</h1>
  </header>
  <style>
    
  </style>

  <div class="main">
    <p class="main-title">会員登録</p>
  </div>



  <div class="form-group">
    <form action="/" method="post">

      <div>
        <input type="txet" class="input-name" name="name" placeholder="名前" value="">
      </div>
      @if ($errors->has('name'))
      <tr>
        <th>ERROR</th>
        <td>
          {{$errors->first('name')}}
        </td>
      </tr>
      @endif

      <div>
        <input type=" txet" class="input-email" name="email" placeholder="メールアドレス" value="">
      </div>

      <div>
        <input type=" txet" class="input-password" name="password" placeholder="パスワード" value="">
      </div>

      <div>
        <input type="txet" class="input-password" name="password" placeholder="確認用パスワード" value="">
      </div>
      <input type="submit" class="button" value="会員登録">
      <p class="">アカウントをお持ちの方はこちらから</p>
      <a href="" class="login">ログイン</a>

    </form>
  </div>

</div>
<!-----end.register---->

@endsection