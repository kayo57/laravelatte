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

//打刻ページ

Route::get('/', [AttendanceController::class, 'index']);
//会員登録ページ
Route::get('/register', [AttendanceController::class, 'store']);
Route::post('/register', [AttendanceController::class, 'store']);
//ログインページ
//Route::get('/', [AttendanceController::class, 'index']);
//日付別勤怠ページ
//Route::get('/', [AttendanceController::class, 'index']);