<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogProject extends Model
{
    use HasFactory;
    protected $table='log_project';
    public $timestamps =false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function type (){
        return $this->belongsTo(LogTypeGroup::class,'log_type_id');
    }
}
