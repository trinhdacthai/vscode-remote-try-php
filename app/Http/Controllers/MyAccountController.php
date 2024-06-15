<?php

namespace App\Http\Controllers;

use App\Helper\DateHelper;
use App\Http\Requests\Home\MyAccount\AddEducationRequest;
use App\Http\Requests\Home\MyAccount\AddExperienceRequest;
use App\Http\Requests\Home\MyAccount\UpdateEducationRequest;
use App\Http\Requests\Home\MyAccount\UpdateExperienceRequest;
use App\Http\Requests\Home\MyAccount\UpdateInfoRequest;
use App\Http\Requests\Home\MyAccount\UpdatePasswordRequest;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserEducation;
use App\Models\Department;
use App\Models\SalaryHistory;
use App\Models\Workexperience;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MyAccountController extends Controller
{
    #get - my information
    public function my_info(){
        $param['department'] = Department::all();
        $admin = User::find(Auth::guard('admin')->id());
        $salary = SalaryHistory::where('user_id',Auth::guard('admin')->id())->get();
        return view('Admin.MyAccount.Info',compact('admin','param','salary'));
    }
    public function post_edit(UpdateInfoRequest $request){
        $admin = User::find(Auth::guard('admin')->id());
        $detail = UserDetail::where('user_id',$admin->id)->first();
//        $bank = BankInfo::where('user_id',$admin->id)->first();
        if($admin == null || $detail == null ){
            Toastr::error('Đã xảy ra lỗi, không tìm thấy');
            return back();
        }
        $request->merge(['birthday'=>DateHelper::str_to_date($request->birthday)]);
        $admin->email=$request->email;
        $admin->phone=$request->phone;
        $admin->designation_id=$request->designation_id;
        if($request->hasFile('avatar')){
            $name = time().Str::random(5).'.'.$request->file('avatar')->getClientOriginalExtension();
          if($admin->avatar != null && file_exists(public_path($admin->avatar))){
              unlink(public_path($admin->avatar));
          }
          $request->file('avatar')->move(public_path('uploads/avatar/'),$name);
          $admin->avatar = 'uploads/avatar/'.$name;
        }
        $admin->save();
        $detail->fullname = $request->fullname;
        $detail->identity_number = $request->identity_number;
        $detail->gender = $request->gender;
        $detail->address = $request->address;
        $detail->birthday = $request->birthday;
        $detail->save();
        // $bank->bank_name =$request->bank_name;
        // $bank->bank_author =$request->bank_author;
        // $bank->bank_number =$request->bank_number;
        // $bank->save();
        Toastr::success('Cập nhật thông tin thành công');
        return back();
    }
    # POST - add experience
    public function post_add_experience(AddExperienceRequest $request){
            $ex = new Workexperience();
            $ex->user_id = Auth::guard('admin')->id();
            $ex->date_start = $request->date_start;
            $ex->date_end = $request->date_end;
            $ex->designation = $request->designation;
            $ex->workplace = $request->workplace;
            $ex->save();
            Toastr::success('Thêm thành công');
            return back();
    }
    # POST - add education
    public function post_add_education(AddEducationRequest $request){
        $edu = new UserEducation();
        $edu->user_id = Auth::guard('admin')->id();
        $edu->education_content = $request->education_content;
        $edu->date_start = $request->date_start;
        $edu->date_end = $request->date_end;
        $edu->save();
        Toastr::success('Thêm thành công');
        return back();
    }
    #Post - update experience
    public function post_update_experience(UpdateExperienceRequest $request,$id){
        $ex = Workexperience::find($id);
        if($ex == null){
            Toastr::error('Lỗi không xác định');
            return back();
        }
        $ex->user_id = Auth::guard('admin')->id();
        $ex->date_start = $request->date_start;
        $ex->date_end = $request->date_end;
        $ex->designation = $request->designation;
        $ex->workplace = $request->workplace;
        $ex->save();
        Toastr::success('Cập nhật thành công');
        return back();
    }
    # post - update education
    public function post_update_education(UpdateEducationRequest $request ,$id){
        $edu = UserEducation::find($id);
        if($edu == null){
            Toastr::error('Lỗi không xác định');
            return back();
        }
        $edu->education_content = $request->education_content;
        $edu->date_start = $request->date_start;
        $edu->date_end = $request->date_end;
        $edu->save();
        Toastr::success('Cập nhật thành công');
        return back();
    }
    public function delete_experience($id){
        $ex = Workexperience::find($id);
        if($ex == null){
            Toastr::error('Đã xảy ra lỗi');
            return back();
        }
        $ex->delete();
        Toastr::success('Thành công');
        return back();
    }
    # get -xóa học vấn
    public function delete_education($id){
        $edu = UserEducation::find($id);
        if($edu == null){
            Toastr::error('Lỗi không xác định');
            return back();
        }
        $edu->delete();
        Toastr::success('Xóa thành công');
        return back();
    }
    # get - chỉnh sửa thông tin học vấn
    public function edit_education(){
        $admin = User::find(Auth::guard('admin')->id());

        return view('Admin.MyAccount.Edit-Education',compact('admin'));
    }

    public function update_password(UpdatePasswordRequest $request) {
        if(!Auth::guard('admin')->check()) {
            Toastr::error('Vui lòng đăng nhập');
            return back();
        }
        $user = User::query()->find(Auth::guard('admin')->user()->id);
        if (Hash::check($request->get('password_old'),$user->password)) {
            User::query()->where('id', Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->password_again)
            ]);
            Toastr::success('Đổi mật khẩu thành công');
            return back();
        }
        Toastr::error('Lỗi không xóa định');
        return back();
    }
}
