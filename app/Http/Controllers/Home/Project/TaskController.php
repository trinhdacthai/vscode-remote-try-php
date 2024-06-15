<?php

namespace App\Http\Controllers\Home\Project;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LogTask;
use App\Models\Notification;
use App\Models\Project;
use App\Models\ProjectImplementer;
use App\Models\Task;
use App\Models\TaskAssign;
use App\Models\TaskDescription;
use App\Models\TaskStatusGroup;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    # get -chi tiết task
    public function task_detail($id){
        $task = Task::find($id);
        if($task == null){
            Toastr::error('Không tồn tại task');
            return back();
        }
        $project_id =$task->project_id;
        $project = Project::Wherehas('implementer_me')->where('id',$task->project_id)->orWhere(function ($query) use ($project_id){
            $query->where('lead_id',Auth::guard('admin')->id())->where('id',$project_id);
        })->first();

        if($project == null){
            Toastr::error('Đã xảy ra lỗi');
            return back();
        }
        $array_member =[];
        $array_member_project = [];
        #get member đã assign
        $member = TaskAssign::where('task_id',$id)->where('project_id',$project_id)->get();
        # get member trong dự án
        $member_project = ProjectImplementer::where('project_id',$project_id)->get();
        if($member->count()>0){
            foreach ($member as $i){
                array_push($array_member,$i->user_id);
            }
        }
        if($member_project->count()>0){
            foreach ($member_project as $i){
                array_push($array_member_project,$i->user_id);
            }
        }
        $param['member'] = User::whereIn('id',$array_member_project)->whereNotIn('id',$array_member)->get();
        $param['status'] = TaskStatusGroup::all();
        return view('Project.task',compact('task','param'));
    }
    # post - Bình luận task
    public function add_comment(Request $request , $id){
        $task = Task::find($id);
        if($task == null){
            Toastr::error('Không tồn tại task');
            return back();
        }
        if($request->task_desc_content == null && !isset($request->task_desc_image)){
            return back()->with('error','Vui lòng viết bình luận hoặc chọn hình ảnh');
        }
            $task_desc = new TaskDescription();
        $task_desc->task_desc_content = $request->task_desc_content;
        $task_desc->task_id = $id;
        $task_desc->created_at =Carbon::now();
        $task_desc->created_by = Auth::guard('admin')->id();
        if($request->hasFile('task_desc_image')){
            $name = time().'-'.Str::random(5).'.'.$request->file('task_desc_image')->getClientOriginalExtension();
            $request->file('task_desc_image')->move(public_path('uploads/task/'),$name);
            $task_desc->task_desc_image = 'uploads/task/'.$name;
        }
        $task_desc->save();
        return back();
    }
    #post - assgin member to task
    public function assign_member(Request $request,$id){
        $task = Task::find($id);
        if($task == null){
            Toastr::error('không tồn tại task');
            return back();
        }
        $project = Project::find($task->project_id)->first();
        if($project == null){
            Toastr::error('Không tồn tại dự án');
            return back();
        }
        if($request->member == null){
            Toastr::error('Vui lòng chọn');
            return back();
        }
        foreach ($request->member as $i){
            $task_assign  = new TaskAssign();
            $task_assign->project_id = $project->id;
            $task_assign->task_id = $task->id;
            $task_assign->user_id = $i;
            $task_assign->save();
            $noti = new Notification();
            $noti->user_id = $i;
            $noti->noti_content = 'thêm vào task';
            $noti->task_id = $task->id;
            $noti->project_id = $project->id;
            $noti->noti_type = 2;
            $noti->created_at = Carbon::now();
            $noti->is_read = 0;
            $noti->save();
        }
        $log = new LogTask();
        $log->user_id = Auth::guard('admin')->id();
        $log->log_type_id = 6;
        $log->task_id = $task->id;
        $log->project_id = $project->id;
        $log->assign_member = json_encode($request->member);
        $log->created_at = Carbon::now();
        $log->save();
        Toastr::success('Thêm thành công');
        return back();
    }
    #post - chuyển trạng thái
    public function change_status (Request $request,$id){
        $task = Task::query()->find($id);
        if($task == null){
            Toastr::error('Không tồn tại task');
            return back();
        }
        $project = Project::find($task->project_id);
        # log _task
        $log = new LogTask();
        $name = $task->status->name;
        $task->task_status_id = $request->status;
        $task->save();
        $task = Task::find($id);
        $log->user_id = Auth::guard('admin')->id();
        $log->log_type_id = 8 ;
        $log->task_id = $task->id;
        $log->project_id = $project->id;
        $log->log_content = $name.' -> '.$task->status->name;
        $log->created_at =Carbon::now();
        $log->save();
    Toastr::success('Đổi trạng thái thành công');
    return back();
    }
    # get - xóa khỏi task
    public function delete_member($id,$user_id){
        $task = Task::find($id);
        if($task ==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $task_assign = TaskAssign::where('user_id',$user_id)->where('task_id',$id)->first();
        if($task_assign == null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $noti = new Notification();
        $noti->user_id = $user_id;
        $noti->noti_content = 'xóa khỏi task';
        $noti->task_id = $task->id;
        $noti->project_id = $task->project_id;
        $noti->noti_type = 2;
        $noti->created_at = Carbon::now();
        $noti->is_read = 0;
        $noti->save();
        $log = new LogTask();
        $log->user_id = Auth::guard('admin')->id();
        $log->log_type_id = 7;
        $log->task_id = $task->id;
        $log->project_id = $task->project_id;
        $log->assign_member = json_encode([$user_id]);
        $log->created_at = Carbon::now();
        $log->save();
        $task_assign->delete();
        Toastr::success('Xóa thành công');
        return back();
    }
}
