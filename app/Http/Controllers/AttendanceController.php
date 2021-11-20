<?php

namespace App\Http\Controllers;
use App\Models\Stamp;
//use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;

//use validator;
//use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    //打刻一覧表示ページ
    //public function index(Request $request)
    //{
        //return view('attendance');
    //}
    //打刻ページ（勤務開始）
    public function start()
    {
        //打刻ページにアクセスできるのは社員のみ
        $user = Stamp::id()->user_id;
        //出勤開始打刻は１日１回まで
        $oldTimestmp = Stamp::where('user_id', $user->id)->latest()->first();
        if ($oldTimestmp) {
            $oldTimestampStart = new Carbon($oldTimestmp->start_work);
        }

       // $date = Carbon::now(); // 現在時刻
        
        // $time = date ("Y-m-d h:i:s");
        // インスタンス生成
        //$datetime = new Carbon();
        return view('auth.attendance');
        
    }
    //打刻
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
}


