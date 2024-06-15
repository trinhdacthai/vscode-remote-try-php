<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    # get - Đăng nhập
    public function get_login(){
        return view('Auth.Login');
    }
    #post - Đăng nhập
    public function post_login(LoginRequest $request){
        if(Auth::guard('admin')->attempt(['user_name'=>$request->user_name,'password'=>$request->password])){
            // if(Auth::guard('admin')->user()->is_deleted == 1){
            //     Auth::guard('admin')->logout();
            //     Toastr::error('Tài khoản bị xóa');
            //     return redirect()->route('dang-nhap');
            // }
            if(Auth::guard('admin')->user()->is_active == 0){
                Auth::guard('admin')->logout();
                Toastr::warning('Tài khoản chưa được kích hoạt!');
                return redirect()->route('dang-nhap');

            }
            Toastr::success('Đăng nhập thành công');
            return redirect()->route('du-an.danh-sach');
        }
        return back()->with('fail','Tài khoản hoặc mật khẩu không đúng!');
    }
    #get - Đăng xuất
    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            Toastr::success('Thành công');
            return redirect(route('dang-nhap'));
        }
        Toastr::error('Vui lòng đăng nhập trước');
        return redirect(route('dang-nhap'));
    }
    # get - đăng kí
    // public function get_register(){
    //     return view('Auth.Register');
    // }
    // # post - register
    // public function post_register(RegisterRequest $request){
    //      $code ='NV-'.time().Str::upper(Str::random(2));

    //     $admin = DB::table('admin')->insertGetId([
    //         'admin_code'=>$code,
    //         'user_name'=>$request->user_name,
    //         'password'=>Hash::make($request->password),
    //         'email'=>$request->email,
    //         'is_active'=>0,
    //         'created_at'=>Carbon::now(),
    //     ]);
    //     $detail = DB::table('user_detail')->insert([
    //         'user_id'=>$admin,
    //         'fullname'=>$request->fullname,
    //     ]);
//        $bank = new BankInfo();
//        $bank->user_id = $admin;
// //        $bank->save();
//         Toastr::success('Đăng kí thành công');
//         return redirect(route('dang-nhap'));
//     }

}
