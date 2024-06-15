<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table='task';
    public $timestamps =false;

    public function status(){
        return $this->belongsTo(TaskStatusGroup::class,'task_status_id');
    }
    public function task_implementer(){
        return $this->hasMany(TaskAssign::class,'task_id');
    }
    public function description(){
        return $this->hasMany(TaskDescription::class,'task_id');
    }
    public function log(){
        return $this->hasMany(LogTask::class,'task_id');
    }
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
