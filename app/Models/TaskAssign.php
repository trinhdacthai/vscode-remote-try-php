<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    use HasFactory;
    protected $table='task_assign';
    public $timestamps =false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
