<?php

namespace App\Http\Controllers;
use App\Models\Stamp;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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


         //打刻ページにアクセスできるのはログインユーザーのみ
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

        //$rest = new Rest();
        $rest = Auth::user();
        $startRest = Rest::where('stamp_id', $rest->id)->latest()->first();


        $startRest = Rest::create([
            'stamp_id' => $rest->id,
            'start_rest' => Carbon::now(),
            'end_rest' => 0,
            'rest_time' => 0
        ]);


        return redirect()->back()->with(['rest_in', '休憩開始']);
    }

    //休憩終了
    public function restend()
    {
        $rest = Auth::user();
        $endRest = Rest::where('stamp_id', $rest->id)->latest()->first();

        $end_rest = new carbon($endRest->end_rest);
        $start_rest = new carbon($endRest->start_rest);

        $endRest->update([
            'end_rest' => Carbon::now(),
            'rest_time' => $rest_time = (strtotime($end_rest) - strtotime($start_rest))
        ]);
        //dd($endRest);

        return redirect()->back()->with(['rest_end', '休憩終了']);
    }

    //日付別勤怠情報取得ページ
    public function date(Request $request)
    {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        $date = $request['date'];

        
        //stamp_dateは今日の日付
        $stamp_date = Stamp::select('stamp_date')->get();


        

        $rests = Rest::select('stamp_id');
        
        //その日の日付だけの合計の休憩時間を取得（表示する）
        $rest_time = DB::table('rests')
            ->where('stamp_id', $user->id)
            ->where('updated_at','like', "$date%")//（updated_at）の％で(日付のみ)前方一致//likeはカラムの文字列検索ができる
            ->sum('rest_time');

            //秒
            $seconds = $rest_time % 60;
            $seconds=sprintf('%02d', $seconds);//0埋め00:00:00
            //分
            $difMinutes = ($rest_time - ($rest_time % 60)) / 60;
            $minutes = $difMinutes % 60;
            $minutes = sprintf('%02d', $minutes);//0埋め00:00:00
            //時
            $difHours = ($difMinutes - ($difMinutes % 60)) / 60;
            $hours = $difHours;
            $hours=sprintf('%02d',$hours);//0埋め00:00:00]

            

        //$変数 = モデル名::join('結合するテーブル名', '元のテーブルのキー', '=','結合するテーブルのキー')
        //->where('参照するカラム名', $引数で渡された値)
        //->get();
        //3つのテーブルを結合（user.stamp.rest）
        $users = Stamp::Join('users', 'stamps.user_id', 'users.id')
            ->leftJoinsub($rests, 'rests', function ($join) {
                $join->on('stamps.id', '=', 'rests.stamp_id');
            })
        ->where('stamp_date', $date)
        ->get();


        //$items = Stamp::Paginate(5);
        $items = Stamp::orderBy('updated_at', 'asc')->Paginate(5);
        
        return view('auth.datepege', compact('users', 'date','stamp_date','rest_time', 'minutes', 'seconds','hours','items'));
    }


    //登録ページ
    public function register()
    {
        return view('register');
    }

    //ログインページ
    public function login()
    {
        return view('login');
    }
    
}


