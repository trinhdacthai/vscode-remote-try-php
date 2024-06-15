<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    protected $table='project';
    public $timestamps =false;
    public function lead(){
        return $this->belongsTo(User::class,'lead_id');
    }
    public function implementer(){
        return $this->hasMany(ProjectImplementer::class,'project_id');
    }
    public function implementer_arr_id(){
        return $this->hasMany(ProjectImplementer::class,'project_id')->pluck('user_id')->toArray();
    }
    public function task(){
        return $this->hasMany(Task::class,'project_id');
    }
    public function implementer_me(){
        return $this->hasMany(ProjectImplementer::class,'project_id')->where('user_id',Auth::guard('admin')->id());
    }
}
