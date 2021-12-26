<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ホーム
Route::get('/', function () {
    return view('welcome');
});
//ユーザー登録が完了するまたはログインが完了する
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//・require ファイルパス: 指定したファイルを読み込み
//・__DIR__ : ファイルのディレクトリパスを表示する。
//なので、web.phpと同じディレクトリにあるauth.phpを読み込んでいる。
require __DIR__.'/auth.php';

//打刻ページ
Route::get('/index', [AttendanceController::class, 'index']);
//勤務開始打刻
Route::get('/start', [AttendanceController::class, 'start']);

//勤務開始を送信
Route::post('/start', [AttendanceController::class, 'start']);

//勤務終了を送信
Route::post('/end', [AttendanceController::class, 'end']);

//休憩開始
Route::post('/reststart', [AttendanceController::class, 'reststart']);

//休憩終了
Route::post('/restend', [AttendanceController::class, 'restend']);

//日付別勤怠ページ
Route::get('/date', [AttendanceController::class, 'date']);

Route::post('/date', [AttendanceController::class, 'date'])->name('date');