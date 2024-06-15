<?php

namespace App\Http\Controllers\Home\Project;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LogProject;
use App\Models\Project;
use App\Models\ProjectImplementer;
use App\Models\Task;
use App\Models\TaskAssign;
use App\Models\TaskDescription;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    # danh sách dự án
    public function list(Request $request){
        $param['list'] = Project::query();

        $param['list'] = $param['list']->Wherehas('implementer_me')
            ->orWhere('lead_id',Auth::guard('admin')->id())->get();

        $request->name ? $param['list']->where('project_name','LIKE','%'.$request->name.'%') : null ;
        $request->leader_id ? $param['list']->where('lead_id','=',$request->leader_id) : null ;
        $request->categories_id!='' ? $param['list']->where('categories_id','=',$request->categories_id) : null ;

        $param['member'] = User::where('is_deleted',0)->get();
//        $param['categories'] = Category::query()->get();
        return view('Project.list',compact('param'));
    }
    # get = chi tiết dự án
    public function detail($project_url, $user_name = null){
        $item = Project::Wherehas('implementer_me')->where('project_url',$project_url)->orWhere(function ($query) use ($project_url){
            $query->where('lead_id',Auth::guard('admin')->id())->where('project_url',$project_url);
        })->first();
        $user = User::query()->where('user_name', $user_name)->first();

        if($item == null){
            Toastr::error('Không đủ quyền');
            return redirect(route('du-an.danh-sach'));
        }
        $all_task  = Task::query()->where('project_id', $item->id);
        $pending_task = Task::query()->where('project_id', $item->id)->where('task_status_id','<>',4);
        $complete_task = Task::query()->where('project_id', $item->id)->where('task_status_id','=',4);
        $view_user = null;
        if ($user) {
            $view_user = $user->id;
            $all_task =  $all_task->whereHas('task_implementer',function ($query) use ($view_user){
                $query->where('user_id', $view_user);
            });

            $pending_task =  $pending_task->whereHas('task_implementer',function ($query) use ($view_user){
                $query->where('user_id', $view_user);
            });
            $complete_task = $complete_task->whereHas('task_implementer',function ($query) use ($view_user){
                $query->where('user_id', $view_user);
            });
        }
        $all_task  = $all_task->get();

        $pending_task = $pending_task->get();
        $complete_task = $complete_task->get();
//        dd($all_task , $pending_task, $complete_task);

        # tạo mảng chứa các member tham gia dự án
        $array_member = [];
        #thêm vào mảng
        foreach ( $item->implementer as $i ){
            array_push($array_member,$i->user_id);
        }
        # get các nhân viên chưa tham gia dự án
        $param['member'] = User::whereNotIn('id',$array_member) ->get();
        # get list các lịch sử thao tác dự án
        $param['log_project'] = LogProject::where('project_id',$item->id)->orderBy('created_at','desc')->get();
        return view('Project.project-detail',compact('item','param','view_user', 'all_task', 'pending_task' , 'complete_task'));
    }

    # post - thêm task
    public function add_task(Request $request,$project_url){
        $project = Project::where('project_url',$project_url)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if(Auth::guard('admin')->id() != $project->lead_id){
            Toastr::error('Không đủ quyền');
            return back();
        }
            $task = new Task();
        $task->task_title =$request->task_title;
        $task->task_description = $request->task_description;
        $task->task_status_id = 1;
        $task->created_at = Carbon::now();
        $task->project_id = $project->id;
       $task->save();
       $log_project = new LogProject();
       $log_project->user_id = Auth::guard('admin')->id();
       $log_project->log_type_id = 1;
       $log_project->log_content = $request->task_title;
       $log_project->project_id = $project->id;
       $log_project->created_at =Carbon::now();
       $log_project->save();
       Toastr::success('Thêm thành công');
           return back();
    }
    # post - chỉnh sửa task
    public function edit_task(Request $request,$project_url,$id){
        $project = Project::where('project_url',$project_url)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if(Auth::guard('admin')->id() != $project->lead_id){
            Toastr::error('Không đủ quyền');
            return back();
        }
        $task = Task::find($id);
        if($task == null){
            Toastr::error('Đã xảy ra lỗi');
            return back();
        }
        $log_project = new LogProject();
        $log_project->user_id = Auth::guard('admin')->id();
        $log_project->log_type_id = 2;
        $log_project->log_content =$task->task_title.' -> '.  $request->task_title;
        $log_project->project_id = $project->id;
        $log_project->save();
        $task->task_title = $request->task_title;
        $task->task_description = $request->task_description;
        $task->save();
        Toastr::success('Sửa thành công');
        return back();
    }
    # post - thêm nhân viên vào dự án
    public function add_member(Request $request,$project_url){

    if(!isset($request->member)|| $request->member == null){
        Toastr::error('Vui lòng chọn thành viên');
        return back();
    }
        $project = Project::where('project_url',$project_url)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if(Auth::guard('admin')->id() != $project->lead_id){
            Toastr::error('Không đủ quyền');
            return back();
        }
    foreach ($request->member as $i){
        $value = new ProjectImplementer();
        $value->project_id = $project->id;
        $value->user_id = $i;
        $value->save();
    }
    $log = new LogProject();
    $log->user_id = Auth::guard('admin')->id();
    $log->log_type_id =4;
    $log->project_id =$project->id;
    $log->assign_member =json_encode($request->member);
    $log->created_at = Carbon::now();
    $log->save();
    Toastr::success('Thêm thành viên thành công');
    return back();

//        dd($request->all());
    }
    # get - xóa thành viên khỏi dự án
    public function delete_user($project_url,$id){
        $project = Project::where('project_url',$project_url)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if(Auth::guard('admin')->id() != $project->lead_id){
            Toastr::error('Không đủ quyền');
            return back();
        }
        $implementer = ProjectImplementer::find($id);
        if($implementer == null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $task_assign = TaskAssign::where('project_id',$project->id)
            ->where('user_id',$implementer->user_id)
            ->get();
        if($task_assign->count() > 0){
            foreach ($task_assign as $i){
                $i->delete();
            }
        }
        $log = new LogProject();
        $log->user_id = Auth::guard('admin')->id();
        $log->log_type_id =5;
        $log->project_id =$project->id;
        $log->assign_member =json_encode([$implementer->user_id]);
        $log->created_at = Carbon::now();
        $log->save();
        $implementer->delete();
        Toastr::success('Xóa thành công');
        return back();
    }
    # get - xóa task
    public function delete_task($project_url,$id){
        $project = Project::where('project_url',$project_url)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if(Auth::guard('admin')->id() != $project->lead_id){
            Toastr::error('Không đủ quyền');
            return back();
        }
        $task = Task::find($id);
        if($task == null){
            Toastr::error('Không tồn tại task');
            return back();
        }
        $task_des = TaskDescription::where('task_id',$task->id)->get();
        if($task_des->count()>0){
            foreach ($task_des as $i ){
                $i->delete();
            }
        }
        $task_assign = TaskAssign::where('project_id',$project->id)->where('task_id',$task->id)->get();
        if($task_assign->count()>0){
            foreach ($task_assign as $i ){
                $i->delete();
            }
        }
        $log = new LogProject();
        $log->user_id = Auth::guard('admin')->id();
        $log->log_type_id =3;
        $log->project_id =$project->id;
        $log->log_content = $task->task_title;
        $log->created_at = Carbon::now();
        $task->delete();
        $log->save();
        Toastr::success('Xóa thành công');
        return back();
    }
}
