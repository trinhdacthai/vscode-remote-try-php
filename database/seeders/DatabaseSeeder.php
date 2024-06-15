<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $admin =  DB::table('admin')->insertGetId([
            'admin_code'=>'NV-'.Str::upper(Str::random(8)),
            'user_name'=>'admin',
            'password'=>Hash::make('abc123'),
            'user_type'=>1,
            'created_at'=>Carbon::now(),
      ]);
      DB::table('user_detail')->insert([
         'user_id'=>$admin,
         'fullname'=>'Quản trị cấp cao',
      ]);
    }
}
