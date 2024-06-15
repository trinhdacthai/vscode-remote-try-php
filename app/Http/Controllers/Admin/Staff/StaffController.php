<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Staff\AddStaffRequest;
use App\Http\Requests\Admin\Staff\UpdateStaffRequest;
use App\Models\User;
use App\Models\Department;
use App\Models\UserDetail;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    # get - danh sách
    public function list_all(Request $request){
        $param['department'] = Department::Wherehas('designation')->get();

        $param['list'] = User::where('user.user_type','<>',1)->where('is_deleted',0);
        $request->id!=''?$param['list']->where('user.user_code',$request->id):null;
        $request->designation!=''?$param['list']->where('user.designation_id',$request->designation):null;
        $request->fullname!=''?
            $param['list']->join('user_detail','user.id','=','user_detail.user_id')->select('user.*')->where('user_detail.fullname','LIKE','%'.$request->fullname.'%')
            :null;
        $param['list'] =    $param['list']->get();
        DateHelper::checksearch($request->all(), count($param['list']));
        return view('Admin.Staff.list',compact('param'));
    }
    #get- danh sách đã xóa
    public function list_trash(Request $request){
        $param['list'] = User::where('user.user_type','<>',1)->where('is_deleted',1)->get();
        return view('Admin.Staff.trash',compact('param'));
    }
    # get - thêm nhân viên
    public function create(){
        $param['department'] = Department::Wherehas('designation')->get();

        return view('Admin.Staff.create',compact('param'));
    }
    #post - thêm nhân viên
    public function post_create(AddStaffRequest $request){

        $user = new User();
        $code = 'NV-'.time().Str::upper(Str::random(2));
        $user->user_code = $code;
        $user->user_name = $request->user_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = 2;
        $user->designation_id = $request->designation_id;
        $user->is_active = 1;
        $user->created_by = Auth::guard('admin')->user()->id;
        $user->created_at = Carbon::now();
        $user->save();
        $detail = new UserDetail();
         $detail->fullname = $request->fullname;
            // xử lí ngày
        $date = Carbon::createFromFormat('d/m/Y',$request->birthday);
            $detail->birthday = $date->format('Y-m-d');
            $detail->gender = $request->gender ?? null;
            $detail->identity_number = $request->identity_number;
            $detail->user_id = $user->id;
            $detail->save();
//        $bank = new BankInfo();
//        $bank->user_id = $user->id;
//        $bank->save();
        Toastr::success('Thêm thành công');
        return redirect(route('quan-tri.quan-ly-nhan-vien.danh-sach'));
    }
    # get- kích hoạt
    public function active($id){
        $admin  = User::find($id);
        if($admin == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $admin->is_active = 1 ;
        $admin->save();
        Toastr::success('Kích hoạt thành công');
        return back();
    }
    # get-hủy kích hoạt
    public function un_active($id){
        $admin  = User::find($id);
        if($admin == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $admin->is_active =0 ;
        $admin->save();
        Toastr::success('Hủy kích hoạt thành công');
        return back();
    }
    #get - Xóa tạm thời
    // public function delete($id){
    //     $admin  = User::find($id);
    //     if($admin == null){
    //         Toastr::error('Không tồn tại tài khoản');
    //         return back();
    //     }
    //     $admin->is_deleted =1 ;
    //     $admin->save();
    //     Toastr::success('Xóa thành công');
    //     return back();
    // }
    // #get - Xóa tạm thời
    // public function refresh($id){
    //     $admin  = User::find($id);
    //     if($admin == null){
    //         Toastr::error('Không tồn tại tài khoản');
    //         return back();
    //     }
    //     $admin->is_deleted =0 ;
    //     $admin->save();
    //     Toastr::success('Khôi phục thành công');
    //     return back();
    // }
    #Get - chỉnh sửa
    public function edit($id){
        $admin  = User::find($id);
        $param['department'] = Department::Wherehas('designation')->get();
        if($admin == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        return view('Admin.Staff.edit',compact('admin','param'));
    }
    # post - chỉnh sửa
    public function post_edit($id, UpdateStaffRequest $request){
            $admin = User::find($id);
            if($admin == null){
                Toastr::error('Không tồn tại tài khoản');
                return back();
            }
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        $admin->designation_id = $request->designation_id;
        $admin->save();
        $detail =  UserDetail::where('user_id',$id)->first();
        $detail->fullname = $request->fullname;
        $detail->address= $request->address;
        // xử lí ngày
        $date = Carbon::createFromFormat('d/m/Y',$request->birthday);
        $detail->birthday = $date->format('Y-m-d');
        $detail->gender = $request->gender;
        $detail->identity_number = $request->identity_number;
        $detail->save();
        Toastr::success('Cập nhật thành công');
        return redirect(route('quan-tri.quan-ly-nhan-vien.danh-sach'));
    }
}
