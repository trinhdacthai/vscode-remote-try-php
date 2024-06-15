<?php

namespace App\Http\Controllers\Admin\Designation;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Designation\AddDesignationRequest;
use App\Http\Requests\Admin\Designation\UpdateDesignationRequest;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class DesignationController extends Controller
{
    public function list(Request $request){
        $department = Department::get();
        $list =Designation::where('is_deleted',0);
        $request->designation_name!=''?$list->where('name','LIKE','%'.$request->designation_name.'%'):null;
        $request->department_id!=''?$list->where('department_id',$request->department_id):null;
        $list= $list->get();
        DateHelper::checksearch($request->all(), count($list));
        return view('Admin.Designation.Index',compact('list','department'));
    }
    public function add(){
        $list['phongban'] = Department::get();
        $list['designation']= Designation::all();
        return view('Admin.Designation.Add',compact('list'));
    }
    public function post(AddDesignationRequest $request){
      $phong= new Designation();
      $phong->name =$request->designation_name;
      $phong->department_id =$request->department_id;
      $phong->created_at = Carbon::now();
      $phong->save();
      Toastr::success("Thêm thành công");
      return redirect(route('quan-tri.vai-tro.danh-sach'));

    }
    public function edit($id){
        // $list['department']= Department::all();
        $list['phongban'] = Department::get();
        $list['designation']= Designation::find($id);
        return view('Admin.Designation.Edit',compact('list'));

    }
    public function post_edit(UpdateDesignationRequest $request,$id){
        $list = Designation::find($id);
        if($list == null){
            Toastr::error("Không tồn tại");
            return back();
        }
        $list->name = $request->designation_name;
        $list->department_id =$request->department_id;
        $list->save();
        Toastr::success("Cập nhật thành công");
        return redirect(route('quan-tri.vai-tro.danh-sach'));

    }
    public function delete($id){
        $admin  = Designation::find($id);
        if($admin == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $admin->delete();

        Toastr::success('Xóa thành công');
        return back();
    }

}
