<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SystemConfigController extends Controller
{
    public function view()
    {
        $param = DB::table('system_config')->first();
//        dd($param);
        return view('Admin.System.SystemConfig', compact('param'));
    }
    public function post_view(Request $request)
    {
        //validate thông báo
        $validate = $request->validate([
            'system_name' =>'required|min:3|max:255',
            'system_logo' =>'image|max:5000',
            'system_info' =>'required|min:3|max:255',
            'system_address'=> 'required|min:3|max:255',
            'system_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|size:10',
            'system_phone_technology' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|size:10',
            'system_facebook' =>'required|min:3|max:255',
        ],
        [
                'system_name.required' => "Vui lòng nhập tên công ty",
                'system_name.min' => "Tên công ty không được ngắn hơn 3 ký tự",
                'system_name.max' => "Tên công ty không được dài hơn 255 ký tự",
                'system_logo.required' =>   "Vui lòng chọn ảnh",
                'system_logo.image' => "Ảnh không đúng định dạng",
                'system_logo.min' => "Ảnh không được nhỏ hơn 10kb",
                'system_logo.max' => "Ảnh không được lớn hơn 5mb",
                'system_info.required' => "Thông tin công ty không được để trống",
                'system_info.min' => "Thông tin công ty không được ngắn hơn 3 ký tự",
                'system_info.max' => "Thông tin công ty không được dài hơn 255 ký tự",
                'system_address.required' => "Địa chỉ công ty không được để trống",
                'system_address.min' => "Địa chỉ công ty không được ngắn hơn 3 ký tự",
                'system_address.max' => "Địa chỉ công ty không được dài hơn 255 ký tự",
                'system_phone.required' => "Số điện thoại không được để trống",
                'system_phone.min' => "Số điện thoại không được ngắn hơn 6 số",
                'system_phone.max' => "Số điện thoại không được dài hơn 15 số",
                'system_phone.size' => "Số điện thoại phải 10 kí tự",
                'system_phone.regex' => "Số điện thoại phải không hợp lệ",
                'system_phone.not_regex' => "Số điện thoại phải không hợp lệ",
                'system_phone_technology.required' => "Số điện thoại không được để trống",
                'system_phone_technology.min' => "Số điện thoại không được ngắn hơn 6 ký tự",
                'system_phone_technology.max' => "Số điện thoại không được dài hơn 15 ký tự",
                'system_phone_technology.size' => "Số điện thoại phải 10 kí tự",
                'system_phone_technology.regex' => "Số điện thoại phải không hợp lệ",
                'system_phone_technology.not_regex' => "Số điện thoại phải không hợp lệ",
                'system_facebook.required' => "Link Contact không được để trống",
        ]);

//        dd($request->all());
        $data = [
            'system_name' => $request->system_name,
//            'system_logo' => $request->system_logo,
            'system_info' => $request->system_info,
            'system_address' => $request->system_address,
            'system_phone' => $request->system_phone,
            'system_phone_technology' => $request->system_phone_technology,
            'system_facebook' => $request->system_facebook,
        ];
        $home_config = DB::table('system_config')->first();
        if($request->hasFile('system_logo')){
            $name = time().'-'.Str::random(5).'.'.$request->file('system_logo')->getClientOriginalExtension();
            $request->file('system_logo')->move(public_path('uploads/logo'),$name);
            $data['system_logo'] = 'uploads/logo/'.$name;
//            dd($request);
            if($home_config->system_logo != null && file_exists(public_path($home_config->system_logo))){
                unlink(public_path($home_config->system_logo));
            }
        }
        $config = DB::table('system_config')->where('id', $home_config->id)->update($data);
        Toastr::success("Cấu hình thành công");
        return back();
    }
}
