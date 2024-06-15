<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table='notification';
    public $timestamps =false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }

}
