<?php

namespace App\Http\Controllers\Admin\Salary;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SalaryHistory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function list(Request $request){
        $list = User::join('user_detail','user.id','=','user_detail.user_id')
            ->select('user.*');
    $request->key!=''?$list->where('user_detail.fullname','LIKE','%'.$request->key.'%'):null;
            $list = $list->get();
        DateHelper::checksearch($request->all(), count($list));
        return view('Admin.Salary.list',compact('list'));
    }
    public function post_change_salary(Request $request,$id){
        $admin = User::find($id);
        if($admin == null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $admin->salary = $request->salary;
        $admin->save();
        Toastr::success('Thành công');
        return back();
    }
    public function post_add_salary(Request $request,$id){
        $admin = User::find($id);
        if($admin == null){
            Toastr::error('Không tồn tại');
            return back();
        }

        $today = Carbon::now();
        
        if(!$today->between(Carbon::now()->startOfMonth(), Carbon::now()->startOfMonth()->addDays(30),true)) {
            Toastr::error('Chỉ tạo phiếu lương từ ngày 1 đến ngày 10 !');
            return back();
        }
        if (SalaryHistory::query()->where('user_id' , $admin->id)->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y/m/d'),Carbon::now()->startOfMonth()->addDays(30)->format('Y/m/d')])->count()) {
            Toastr::error('Tháng này đã tạo phiếu lương !');
            return back();
        }
        $salary = new SalaryHistory();
        $salary->user_id = $id;
        $salary->basic_salary = $admin->salary;
        $salary->total_off = $request->total_off;
        $salary->bonus = $request->bonus;
        $salary->created_at = Carbon::now();
        $salary->created_by = Auth::guard('admin')->id();
        $total = $admin->salary - ($admin->salary/22 * $request->total_off)+$salary->bonus;
        $salary->total_salary = $total;
        $salary->save();
        Toastr::success('Thành công');
        return back();
    }
    public function history(Request $request){
        $list = SalaryHistory::get();
        return view('Admin.Salary.history',compact('list'));
    }
    # download pdf
    // public function testpdf ($id){
    //     $salary = SalaryHistory::find($id);
    //     $us = User::find($salary->user_id);
    //     $system = DB::table('system_config')->first();
    //     $pdf = \PDF::loadView('Admin.Example.payslip',compact('salary','system','us'));
    //     return $pdf->download($us->user_detail->fullname.'-'.time().'.pdf');
    // }
}
