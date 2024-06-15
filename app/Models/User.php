<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='user';
    public $timestamps= false;

    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_detail(){
        return $this->hasOne(UserDetail::class,'user_id');
    }
    # vai trò
    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
    # học vấn
    public function education(){
        return $this->hasMany(UserEducation::class,'user_id')->orderBy('date_start');
    }
    # kinh nghiệm
    public function experience(){
        return $this->hasMany(Workexperience::class,'user_id');
    }
    #thông tin ngân hàng
    public function bank(){
        return $this->hasOne(BankInfo::class,'user_id');
    }
    public function role(){
        return $this->belongsTo(Role::class,'role_id');

    }
    public function salary_month(){
        return $this->hasOne(SalaryHistory::class,'user_id')
            ->whereYear('created_at',Carbon::now()->format('Y'))->whereMonth('created_at',Carbon::now()->format('m'));
    }
}
