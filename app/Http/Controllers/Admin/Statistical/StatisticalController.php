<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Invoices;
use App\Models\Project;
use App\Models\SalaryHistory;
use App\Models\Task;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index(){

        $project= Project::all();
        $task = Task::all();
        $customer = Customer::all();
        $admin = User::all();
        // $salary = SalaryHistory::all();
        // $invoice = Invoices::all();
        // tổng thu
        // $total = 0;
        // // hóa đơn chi
        // $desc = 0;
        // foreach ($salary as $i){
        //     $desc+=$i->total_salary;
        // }
        // foreach ($invoice as $i){
        //     // tổng thu chi
        //     if($i->type == 0 ){
        //         $total+=$i->total;
        //     }
        //     else {
        //         $desc+=$i->total;
        //     }

        // }
        // $invoice = $invoice->take(5);

        return view('Admin.Statistical.Index',
        compact('project','task','customer','admin')
        );
    }
}
