<?php

namespace App\Http\Controllers\Admin\Department;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department\AddDepartmentRequest;
use App\Http\Requests\Admin\Department\UpdateDepartmentRequest;
use App\Models\Department;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function list(Request $request){
        $list = Department::query();
        $request->key!=''?$list->where('name','LIKE','%'.$request->key.'%'):null;
        $list= $list->get();
        $department = Department::get();

        DateHelper::checksearch($request->all(), count($list));

      return view('Admin.Department.Index',compact('list'));
    }
    public function add(){
        $list['department']= Department::all();
        return view('Admin.Department.Add');
    }
    public function post(AddDepartmentRequest $request){
      $phong= new Department();
      $phong->name =$request->department_name;
      $phong->created_at = Carbon::now();
      $phong->save();
      Toastr::success("Thêm thành công");
      return redirect(route('quan-tri.phong-ban.danh-sach'));
    }

    public function edit($id){
        // $list['department']= Department::all();
        $list['department']= Department::find($id);
        return view('Admin.Department.Edit',compact('list'));

    }
    public function post_edit(UpdateDepartmentRequest $request,$id){
        $list = Department::find($id);
        if($list == null){
            Toastr::error("Không tồn tại");
            return back();
        }
        $list->name = $request->department_name;
        $list->save();
        Toastr::success("Cập nhật thành công");
        return redirect(route('quan-tri.phong-ban.danh-sach'));
    }
    public function delete_item($id){
        $list = Department::find($id);
        if($list == null){
            Toastr::error("Không tồn tại");
            return back();
        }
        if($list->designation->count() >0 ){
            Toastr::error('Không thể xóa !!!');
            return back();
        }
        $list->delete();
        Toastr::success('Xóa thành công');
        return back();
    }
}
