<?php

namespace App\Http\Controllers\Admin\Project;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\AddProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Models\User;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectImplementer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

//use phpDocumentor\Reflection\Project;

class ProjectController extends Controller
{
    # get - danh sách dự án
    public function list(Request $request){
        $param['list'] = Project::query();
        // query
        $request->name ? $param['list']->where('project_name','LIKE','%'.$request->name.'%') : null ;
        $request->leader_id ? $param['list']->where('lead_id','=',$request->leader_id) : null ;
        $request->categories_id!='' ? $param['list']->where('categories_id','=',$request->categories_id) : null ;
        // end search

        $param['list'] =  $param['list']->get();
        $param['member'] = User::where('is_deleted',0)->get();
        DateHelper::checksearch($request->all(), count($param['list']));
        return view('Admin.Project.list',compact('param'));
    }
    # get thêm
    public function create(){
        $param['member'] = User::where('is_deleted',0)->get();
//        $param['categories'] = Category::query()->get();
        $param['customer']=Customer::all();
        return view('Admin.Project.create',compact('param'));
    }
    # post - thêm
    public function post_create(AddProjectRequest $request){
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->project_url = Str::slug($request->project_name);
        // $project->technology = json_encode($request->technology);
        $project->lead_id = $request->leader_id;
        $project->date_start = $request->date_start;
        $project->date_end = $request->date_end;
        // $project->link_source = $request->link_source;
        // $project->link_document = $request->link_document;
        $project->total_expense = $request->total_expense;
        $project->project_description = $request->project_description;
        $project->customer_id = $request->customer_id;
        $project->priority = $request->priority;
        // $project->categories_id = $request->categories_id;
        $project->project_status = 0;
        if($request->hasFile('project_image')){
            $name = Str::random(4).time().'.'.$request->file('project_image')->getClientOriginalExtension();
            $request->file('project_image')->move(public_path('uploads/project'),$name);
            $project->project_image = 'uploads/project/'.$name;
        }
        $project->save();
        foreach ($request->member as $i){
            $imple = new ProjectImplementer();
            $imple->user_id = $i;
            $imple->project_id = $project->id;
            $imple->save();
        }
        Toastr::success('Thêm dự án thành công');
        return redirect(route('quan-tri.du-an.danh-sach'));

    }

    public function edit($id) {
        $item = Project::query()->find($id);
        if (!$item) {
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        $param['member'] = User::where('is_deleted',0)->get();
//        $param['categories'] = Category::query()->get();

        $param['customer']=Customer::all();
        return view('Admin.Project.edit',compact('item','param'));
    }
    public function post_edit ($id ,UpdateProjectRequest $request) {
        $project = Project::query()->find($id);
        if (!$project) {
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        $project->project_name = $request->project_name;
        $project->project_url = Str::slug($request->project_name);
        // $project->technology = json_encode($request->technology);
        $project->lead_id = $request->leader_id;
        $project->date_start = $request->date_start;
        $project->date_end = $request->date_end;
        // $project->link_source = $request->link_source;
        // $project->link_document = $request->link_document;
        $project->total_expense = $request->total_expense;
        $project->project_description = $request->project_description;
        $project->customer_id = $request->customer_id;
        $project->priority = $request->priority;
        // $project->categories_id = $request->categories_id;

        if($request->hasFile('project_image')){
            $name = Str::random(4).time().'.'.$request->file('project_image')->getClientOriginalExtension();
            $request->file('project_image')->move(public_path('uploads/project'),$name);
            $project->project_image = 'uploads/project/'.$name;
        }

        $project->save();
        foreach ($project->implementer_arr_id() as $i) {
            if (!in_array($i,$request->member)) {
                DB::table('task_assign')->where(['project_id'=>$project->id,'user_id'=>$i])->delete();
                DB::table('project_implementer')->where(['project_id'=>$project->id,'user_id'=>$i])->delete();
            }
        }

        foreach ($request->member as $i){
            if (!in_array($i,$project->implementer_arr_id())) {
                $imple = new ProjectImplementer();
                $imple->user_id = $i;
                $imple->project_id = $project->id;
                $imple->save();
            }
        }

        Toastr::success('Cập nhật dự án thành công');
        return redirect(route('quan-tri.du-an.danh-sach'));
    }

    public function delete ($id) {
        $project = Project::query()->find($id);
        if (!$project) {
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        $project->delete();
        Toastr::success('Xóa thành công');
        return back();
    }
}
