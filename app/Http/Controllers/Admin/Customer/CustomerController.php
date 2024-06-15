<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\AddCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function all(Request $request){
        $list = Customer::query();
        $request->key !=''?$list->where('customer_name','LIKE','%'.$request->key.'%'): null;
        $request->key !=''?$list->where('email','LIKE','%'.$request->key.'%'): null;


        $list = $list->get();
                DateHelper::checksearch($request->all(), count($list));
        return view('Admin.Customer.list',compact('list'));
    }


    public function get_add(){
        return view('Admin.Customer.create');
    }
    public function post_add(AddCustomerRequest $request){
        $cus = new Customer();
        $cus->customer_name = $request->customer_name;
        $cus->birthday = $request->birthday;
        $cus->gender = $request->gender;
        $cus->phone = $request->phone;
        $cus->email = $request->email;
        $cus->address = $request->address;
        if($request->hasFile('avatar')){
            $name = time().'-'.Str::random(4).'.'.$request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('uploads/customer/'),$name);
            $cus->avatar = 'uploads/customer/'.$name;
        }
        $cus->save();
        Toastr::success('Thêm thành công');
        return redirect()->route('quan-tri.khach-hang.danh-sach');
    }
    public function get_edit($id){
        $item = Customer::find($id);
        if($item == null){
            Toastr::error('Không tồn tại');
            return back();
        }
        return view('Admin.Customer.edit',compact('item'));
    }
    public function post_edit(UpdateCustomerRequest $request,$id){
        $cus = Customer::find($id);
        if($cus == null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $cus->customer_name = $request->customer_name;
        $cus->birthday = $request->birthday;
        $cus->gender = $request->gender;
        $cus->phone = $request->phone;
        $cus->email = $request->email;
        $cus->address = $request->address;
        if($request->hasFile('avatar')){
            if($cus->avatar!=null && file_exists(public_path($cus->avatar))){
                unlink(public_path($cus->avatar));
            }
            $name = time().'-'.Str::random(4).'.'.$request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('uploads/customer/'),$name);
            $cus->avatar = 'uploads/customer/'.$name;
        }
        $cus->save();
        Toastr::success('Thành công');
        return redirect()->route('quan-tri.khach-hang.danh-sach');
    }
    public function delete_item ($id){
        $cus = Customer::find($id);
        if($cus ==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        if($cus->project->count() > 0 ){
            Toastr::error('Không thể xóa');
            return back();
        }
        if($cus->avatar!=null && file_exists(public_path($cus->avatar))){
            unlink(public_path($cus->avatar));
        }
        $cus->delete();
        Toastr::success('Thành công');
        return back();

    }
}
