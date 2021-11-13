<!---ベース---->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<style>

</style>

<body>
  <!-------打刻ページ-------->
  <div class="content">
    @yield('content')
  </div>


  <!----会員登録画面ページ------>
  <div class="register">
    @yield('register')
  </div>


</body>

</html>