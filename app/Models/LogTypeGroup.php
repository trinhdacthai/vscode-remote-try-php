<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTypeGroup extends Model
{
    use HasFactory;
    protected $table='log_type_group';
    public $timestamps =false;
}
