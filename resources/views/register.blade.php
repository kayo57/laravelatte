<!-----会員登録ページ------>
@extends('Layouts.app')
@section('register')
<div class="register">
  <header class="header">
    <div class="header-ttl">
      <h1>Atte</h1>
  </header>
  <div class="main">
    <p class="main-title">会員登録</p>
  </div>



  <div class="form-group">
    <form action="" method="post">

      <div><input type="txet" class="input-name" name="name" value=""></div>

      <div><input type="txet" class="input-email" name="email" value=""></div>

      <div><input type="txet" class="input-password" name="password" value=""></div>

      <div><input type="txet" class="input-password" name="password" value=""></div>
      <input type="submit" class="button" value=" 会員登録">
      <p class="">アカウントをお持ちの方はこちらから</p>
      <a href="" class="login">ログイン</a>

    </form>
  </div>

</div>
<!-----end.register---->
@endsection