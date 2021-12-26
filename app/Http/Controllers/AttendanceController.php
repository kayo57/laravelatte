<?php

namespace App\Http\Controllers;
use App\Models\Stamp;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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

        $endtimestamp->update([
            'end_work' => Carbon::now()
        ]);

        return redirect()->back()->with('end_in', '退勤打刻が完了しました');
    }

    //休憩開始
    public function reststart()
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
    }

    //休憩終了
    public function restend()
    {
        $rest = Auth::user();
        $endtRest = Rest::where('stamp_id', $rest->id)->latest()->first();
        $endRest = Rest::create([
            'stamp_id' => $rest->id,
            'end_rest' => Carbon::now(),
            'start_rest' => 0
        ]);
        return redirect()->back()->with(['rest_end', '休憩終了']);
    }

    //日付別勤怠情報取得ページ
    public function date(Request $request)
    {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        //日付
        $date = date('Y-m-d');
        // $stamp_date = date('Y-m-d');

        $stamp_date = Stamp::select('stamp_date')->get();
        if (!$stamp_date) {
            return redirect('/datepege')->back()->with('message', '勤怠履歴がありません');
        }

        /** 
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['date'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $date = Stamp::getDate($request['from'], $request['date']);
        } else {
            //リクエストデータがなければそのままで表示
            $date = Stamp::get();
        }
        **/
        
        
        //stampモデルにuserモデルを結合
        //$変数 = モデル名::join('結合するテーブル名', '元のテーブルのキー', '=','結合するテーブルのキー')
        //->where('参照するカラム名', $引数で渡された値)
        //->get();
        //$stampdates = Stamp::select('stamp_date')->get();
        
        
        $users = Stamp::Join('users', 'stamps.user_id', '=', 'users.id')
        //->where('stamps.stamp_date',$stamp_date)
            //->where('stamps.user_id', '=', $stamp_date)
            ->where('stamp_date', $date)
        ->get();
         
        
        
        //$users = Stamp::leftJoin('users', 'stamps.user_id', '=', 'users.id')
        //->get();

        //$users = User::where('user_id', Auth::user()->id)
        //->orderBy('created_at','asc')
        //->paginate(5);


        //$query = Stamp::query();
        //ページネーション
             //$items = $users->orderBy('id','desc')->paginate(5);
        //return view('auth.datepege')->with('users', $users);
        //$items = $query->orderBy('id','desc')->paginate(5);
        $items = Stamp::Paginate(5);
        //return view('auth.datepege',compact('users', 'date','items'));
        return view('auth.datepege', compact('users', 'date', 'items','stamp_date'));
    }


    //登録ページ
    public function register()
    {
        return view('auth.register');
    }

    //ログインページ
    public function login()
    {
        return view('auth.login');
    }
}


