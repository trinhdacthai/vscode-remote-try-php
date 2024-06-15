<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table='page';
    public $timestamps =false;

    public function child(){
        return $this->hasMany(Page::class,'parent_id');
    }
}
