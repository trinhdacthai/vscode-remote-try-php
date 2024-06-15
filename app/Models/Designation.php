<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table='designation';
    public $timestamps=false;
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
