<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable =[
        'id',
        'name',
        'user_all',
        'email',
        'password',
        'user_id',
        'start_work',
        'end_work',
        'stamp_date',
        'start_break',
        'end_break',
        'stamp_id'
    ];
    public static $rules = array(
        'name' =>'required|max:255',
        'email' => 'required|max:255',
        'password' => 'required|min:8|max:255'
    );
}