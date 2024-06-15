<?php

namespace App\Http\Controllers\Admin\Role;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\AddRoleRequest;
use App\Http\Requests\Admin\Role\AdminRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Page;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
  public function list_role(Request $request){
        $list = Role::query();
      $request->key !=''?$list->where('role_name','LIKE','%'.$request->key.'%'): null;
      $list = $list->get();
      DateHelper::checksearch($request->all(), count($list));
        return view('Admin.Role.list',compact('list'));
  }
  public function get_add_role(){
      $page_role = Page::where('parent_id',null)->where('page_type',0)->get();
      return view('Admin.Role.create',compact('page_role'));
  }
  public function post_add_role(AddRoleRequest $request){
        $role = new Role();
        $role->role_name = $request->role_name;
        $role->role_permission =serialize($request->page);
        $role->created_at = Carbon::now();
        $role->created_by = Auth::guard('admin')->id();
        $role->save();
        Toastr::success('Thành công');
        return redirect()->route('quan-tri.phan-quyen.danh-sach');

  }
  public function get_edit_role($id){
      $role = Role::find($id);
      $page_role = Page::where('parent_id',null)->where('page_type',0)->get();

      if($role == null){
          Toastr::error('Không tồn tại');
          return back();
      }
      return view('Admin.Role.edit',compact('role','page_role'));
  }
  public function post_edit_role(UpdateRoleRequest $request,$id){
      $role = Role::find($id);
      if($role == null){
          Toastr::error('Không tồn tại');
          return back();
      }
      $role->role_name = $request->role_name;
      $role->role_permission =serialize($request->page);
      $role->save();
      Toastr::success('Thành công');
      return redirect()->route('quan-tri.phan-quyen.danh-sach');
  }
  public function admin_role(Request  $request){
      $user = User::where('user_type',2);
        $request->username!=''?$user->where('user_name','LIKE',$request->username):null;
      $user = $user->get();
      $role = Role::all();
      $list = UserRole::all();
      DateHelper::checksearch($request->all(), count($list));
      return view('Admin.Role.admin_role',compact('list','user','role'));
  }
  public function update_role(AdminRoleRequest $request,$id){
        $user = User::find($id);
        if($user == null){
            Toastr::error('Không tồn tại nhân viên');
            return back();
        }
        $user->role_id = $request->role_id;
        $user->save();
        Toastr::success('Thành công');
        return back();
  }
  public function delete_item($id){
    $list = Role::find($id);
    if($list == null){
        Toastr::error("Không tồn tại");
        return back();
    }
    // if($list->designation->count() >0 ){
    //     Toastr::error('Không thể xóa !!!');
    //     return back();
    // }
    $list->delete();
    Toastr::success('Xóa thành công');
    return back();
}
}
