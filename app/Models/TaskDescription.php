<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDescription extends Model
{
    use HasFactory;
    protected $table='task_description';
    public $timestamps =false;
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

}
