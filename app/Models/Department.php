<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table='department';
    public $timestamps=false;
    public function designation(){
        return $this->hasMany(Designation::class,'department_id');
    }
}
