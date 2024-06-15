<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImplementer extends Model
{
    use HasFactory;
    protected $table='project_implementer';
    public $timestamps =false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
