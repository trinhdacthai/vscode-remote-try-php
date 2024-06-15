<li class="task">
    <div class="task-container">
            <span class="task-action-btn task-check">
                <span class="edit-task action-circle large complete-btn" data-bs-toggle="modal" data-bs-target="#edit_task{{$type}}{{$task->id}}"  data-id="" data-title="" data-content="" title="Chỉnh sửa">
                <i class="material-icons">edit</i>
                </span>
            </span>
        <div id="edit_task{{$type}}{{$task->id}}" class="modal custom-modal fade" role="dialog" aria-modal="true" style="display: none; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">CHỈNH SỬA CÔNG VIỆC</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('du-an.chinh-sua-task',[$task->project->project_url,$task->id])}}" method="post" enctype="">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="task_title" value="{{$task->task_title}}" required type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nội dung chi tiết công việc</label>
                                <textarea type="text"   name="task_description" required class="form-control">{{$task->task_description}}</textarea>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-lg">CẬP NHẬT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('task.chi-tiet',$task->id)}}" class="task-label">{{$task->task_title}}</a>
        <div style="position: absolute ;left: 50%">
            @if($task->task_implementer->count()>0)
                @foreach($task->task_implementer as $ii)
                    <a href="#" data-bs-toggle="tooltip" title="{{$ii->user->user_detail->fullname}}">
                        <img style="width: 20px" alt="" src="{{asset($ii->user->avatar??"uploads/avatar/avatar_defaul1.png")}}">
                    </a>
                @endforeach
            @endif
        </div>
        <div style="position: absolute ;left: 80%">
            <span class="b{{$task->status->class_text_style}} {{$task->status->class_bg_style}}">{{$task->status->name}}</span>
        </div>
        <span class="task-action-btn task-btn-right">
            <span data-bs-toggle="modal" data-bs-target="#add_member{{$type}}{{$task->id}}" class="action-circle large" title="Thêm thành viên">
            <i class="material-icons">person_add</i>
            </span>
            <span class="action-circle large delete-btn delete_task" data-id="{{$task->id}}" data-project_url="{{$task->project->project_url}}" data-task="{{$task->task_title}}" title="Xóa công việc">
            <i class="material-icons ">delete</i>
            </span>
        </span>
    </div>

    <div id="add_member{{$type}}{{$task->id}}" class="modal custom-modal fade " role="dialog"
         aria-modal="true" style="display: none; padding-left: 0px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thành viên vào task</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('task.them-thanh-vien',$task->id)}}"
                          method="post">
                        @csrf
                        <div>
                            <select name="member[]" class="select select_member" multiple="multiple">
                                @foreach($member as $i)
                                    <option value="{{$i->user->id}}">{{$i->user->user_detail->fullname ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</li>
