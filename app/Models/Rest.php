<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $table = 'rests';
    protected $fillable = [
        'stamp_date',
        'start_rest',
        'end_rest',
        'stamp_id',
        'rest_time'
    ];
    
    /**public function stamp()
    {
        return $this->belongsTo(Stamp::class);
    }**/
}

