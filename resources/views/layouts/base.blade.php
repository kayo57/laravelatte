<!-------------ベース・テンプレート------------->


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>勤怠管理</title>
</head>

<body>
  <main>
    <!----打刻ページ・views/auth/attendance.blade.php----->
    @yield('content')
  </main>


  <div>
    <!-----登録ページ・views/auth/register.blade.php----->
    @yield('register')
  </div>

  <div>
    <!-----ログインページ・views/auth/login.blade.php----->
    @yield('login')
  </div>
  <div>
    <!-----日付別勤怠ページ・.views/auth/?blade.php----->
  </div>

  <div>
    @yield('dashboard')
  </div>

</body>

</html>