<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
  use HasFactory;
  protected $table = 'stamps';
  protected $fillable = [
    'stamp_date',
    'start_break',
    'end_break',
    'stamp_id'
  ];
  public static $rules = array(
    
  );
}