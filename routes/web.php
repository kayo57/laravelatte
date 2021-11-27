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
Route::get('/', [AttendanceController::class, 'index']);
//打刻をするページ
//Route::get('/start', [AttendanceController::class, 'start']);
Route::post('/', [AttendanceController::class, 'start']);

//会員登録ページ
Route::post('/register', [AttendanceController::class, 'register'])->name('register');
//Route::post('/register', [AttendanceController::class, 'table']);
//ログインページ
Route::get('/login', [AttendanceController::class, 'login'])->name('login');
Route::post('/login', [AttendanceController::class, 'login']);

//日付別勤怠ページ
//Route::get('/', [AttendanceController::class, 'date']);