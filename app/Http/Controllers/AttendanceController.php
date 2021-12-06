<?php

namespace App\Http\Controllers;
use App\Models\Stamp;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


//use validator;
//use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    //打刻一覧表示ページ
    public function index(Request $request)
    {
        $name = $request->name;
        
        if (Auth::attempt(['name' => $name])){
            $name = User::user()->name;
            
        }
        //return view('auth.attendance',['name' => $name, 'text' => $text]);
        
        return view('auth.attendance');
    }

    //打刻ページ（勤務開始）
    public function start()
    {
        
        // Userのmodelクラスのインスタンスを生成
        $user = new User();
        // データベースに値をinsert
        /**$user->create([
        'name' => 'testname',
        'email' => 'mail@test.com',
        'password' => 'testpassword',
         ]);**/

        //打刻ページにアクセスできるのは社員のみ

        //user()メソッドは、認証を行ったユーザー情報を取得するためのメソッド
        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldTimestamp = Stamp::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestampStart = new Carbon($oldTimestamp->start_work);
            $oldTimestampDay = $oldTimestampStart->startOfDay();
        } 

            $timestamp = Stamp::create([
                'user_id' => $user->id,
                'start_work' => Carbon::now(), //現在時刻
                'end_work' => 0,
                'stamp_date' => Carbon::today(), //今日の日付
            ]);
        //dd($timestamp);

        //return view('auth.attendance');
        //return redirect('/start');
        //return view('auth. attendance');
        //return view('/');
        return redirect()->back()->with(['start_in' ,'出勤打刻が完了しました']);
        
    }

    //勤務終了
    public function end()
    {
        $user = Auth::user();
        $endtimestamp = Stamp::where('user_id', $user->id)->latest()->first();
        //return redirect()->back()->with('end_in', '出勤打刻が完了しました');

        $endtimestamp->update([
            'end_work' => Carbon::now()
        ]);
        //dd($endtimestamp);
        return redirect()->back()->with('end_in', '退勤打刻が完了しました');
    }

    //休憩開始
    public function rest()
    {

        $rest = new Rest();
        $rest = Auth::user();
        $startRest = Rest::where('stamp_id', $rest->id)->latest()->first();
        

        $startRest = Rest::create([
            'stamp_id' => $rest->id,
            'start_rest' => Carbon::now(),
            'end_rest' => 0
        ]);


        return redirect()->back()->with(['rest_in', '休憩開始']);
        //return view('auth'.'attendance');

    }


    //登録ページ
    public function register()
    {
        //log::info('auth.register');
        return view('auth.register');
    }

    //ログインページ
    public function login()
    {
        return view('auth.login');
    }
}


