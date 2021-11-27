<?php

namespace App\Http\Controllers;
use App\Models\Stamp;
use App\Models\User;
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
        
        return view('auth.attendance');
    }
    
    
    //打刻ページ（勤務開始）
    public function start()
    {
        //Userのmodelクラスのインスタンスを生成
        $user = new User();
        // データベースに値をinsert
        $user->create([
        'name' => 'testname',
        'email' => 'mail@test.com',
        'password' => 'testpassword',
         ]);

        //打刻ページにアクセスできるのは社員のみ

        $user = User::user()->user_id;
        $stamp = new Stamp();


        //$date = Carbon::now();//日時を取得
        //Log::info("========================");
        //Log::info($date->year);
        //Log::info("========================");
        //Log::info(Carbon::now());
        
        Stamp::create([
            'user_id' => 1,
            'start_work' => Carbon::now(),
            'end_work' => 0,
            'stamp_date' => Carbon::today(),
        ]);
        
        return view('auth.attendance');
        //return view('/');
        //return redirect('/');
        //出勤開始打刻は１日１回まで
        //= Stamp::where('user_id', $user->id)->latest()->first();
        //if ($oldTimestmp) {
        //$oldTimestamp = new Carbon($oldTimestmp->start_work);
        //}

        //日時を取得
        //$date = Carbon::now(); // 現在時刻
        //$date->format('Y/m/d');
        //$date ("Y-m-d h:i:s");
        
        //return view('auth.attendance');
        
    }

    //会員登録ページ
    //public function store(Request $request)
    //{
    //バリテーション
    //validator = Validator::make($request->all(),[
    //$validate_rule = [
    //'name' => 'required|max:255',
    //'email' => 'required|max:255',
    //'password' =>'required|min:8|max:255'
    //];
    //バリテーションエラー
    //$this->validate($request, $validate_rule);
    //$form = $request->all();
    //if ($validator->fails()) {
    //return redirect('/')
    //->withInput()
    //->withErrors($validator);
    //}
    //return view('app.register');
    //return view('register');
    //}

    //登録ページ
    public function register()
    {
        
        //log::info('auth.register');
        return view('auth.register');
    }

    //ログインページ
    public function login(Request $request)
    {
        
        //log::info('auth.login');
        return view('auth.login');
       
    }
    
}


