<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
//use validator;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    //打刻ページ
    public function index(Request $request)
    {
        return view('attendance');
    }
    //会員登録ページ
    public function store(Request $request)
    {
        //バリテーション
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' =>'required|min:8|max:255'
        ]);
        //バリテーションエラー
        //if ($validator->fails()) {
            //return redirect('/')
            //->withInput()
            //->withErrors($validator);
        //}
        //return view('app.register');
        return view('register');
    }
}