@extends('Admin.Layouts.Master')
@section('title','Chi tiết công việc1')
@section('content')
    <div class="content container-fluid pt-5">
        <div class="chat-main-row">
            <div class="chat-main-wrapper pt-2">
                <div class="col-lg-3 message-view task-chat-view task-left-sidebar" id="task_window">
                    <div class="chat-window">
                        <div class="chat-contents task-chat-contents">
                            <ul class="breadcrumb">
                                <li class="btn btn-success w-10 fa fa-arrow-left"><a
                                            href="{{route('du-an.chi-tiet',$task->project->project_url)}}"
                                            style="color: aliceblue"> Trở lại</a></li>
                            </ul>
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="chats">
                                            <h4>Thành viên</h4>
                                            @if($task->task_implementer->count() > 0)
                                                <div class="task-header">
                                                    <div class="assignee-info">
                                                        @foreach($task->task_implementer as $i)
                                                            <div class="avatar">
                                                                <img data-bs-toggle="tooltip"
                                                                     title="{{$i->user->user_detail->fullname}}" alt=""
                                                                     src="{{asset($i->user->avatar??'uploads/avatar/avatar_defaul1.png')}}">
                                                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->id() == $task->project->lead_id)
                                                                    <span class="delete-member"
                                                                          data-user_id="{{$i->user->id}}"
                                                                          data-user="{{$i->user->user_detail->fullname}}"
                                                                          data-id="{{$task->id}}"
                                                                          style="color: black;z-index: 99;position: absolute;right: 0;top: -10px"><i class="fa fa-remove"></i>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->id() == $task->project->lead_id)
                                                    <button class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#add_member">Thêm</button>
                                                @endif
                                            @else
                                                <div>Chưa có thành viên</div>
                                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->id() == $task->project->lead_id)
                                                    <button class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#add_member">Thêm</button>
                                                @endif
                                            @endif
                                            <div id="add_member" class="modal custom-modal fade " role="dialog"
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
                                                                    <select name="member[]" class="select"
                                                                            id="select_member" multiple="multiple">
                                                                        @foreach($param['member'] as $i)
                                                                            <option value="{{$i->id}}">{{$i->user_detail->fullname.' ('.$i->designation->name.')' }}</option>
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
                                            <hr class="task-line">
                                            <h4>BÌNH LUẬN</h4>
                                            @if($task->description->count()>0)
                                                @foreach($task->description as $i)
                                                    <div class="chat chat-left">
                                                        <div class="chat-avatar">
                                                            <a href="profile.html" class="avatar">
                                                                <img alt=""
                                                                     src="{{asset($i->user->avatar??'uploads/avatar/avatar_defaul1.png')}}">
                                                            </a>
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-bubble">
                                                                <div class="chat-content">
                                                                    <span class="task-chat-user">{{$i->user->user_detail->fullname}}</span>
                                                                    <span class="chat-time">{{App\Helper\DateHelper::datetime($i->created_at)}}</span>
                                                                    <p>{{$i->task_desc_content??""}}</p>
                                                                    @if(file_exists(public_path($i->task_desc_image)) && $i->task_desc_image!=null)
                                                                        <a href="/{{$i->task_desc_image}}"
                                                                           target="_blank"><img style="width: 100%"
                                                                                                src="{{asset($i->task_desc_image)}}"></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 37%;position: fixed;bottom: 20px;" class="chat-footer">
                        <img id="preview-image" style="width: 50px;display:none;margin-left: 50px"
                             src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg">
                        <div class="message-bar">
                            <div class="message-inner">
                                <a class="link attach-icon" href="#"><img src="assets/img/attachment.png" alt=""></a>
                                <label for="file-image" style="position: absolute;left: 0px;top: 25%"><i
                                            class="fa fa-file-image-o"></i></label>
                                <div class="message-area">
                                    <form action="{{route('task.them-binh-luan',$task->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group" style="position: relative">
                                            <input id="file-image" name="task_desc_image" type="file"
                                                   onchange="loadFile(event)" accept="image/*"
                                                   style="opacity: 0;position: absolute">
                                            <textarea name="task_desc_content" class="form-control"
                                                      placeholder="Viết bình luận..."></textarea>
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                        @if(\Illuminate\Support\Facades\Session::has('error'))
                                            <span class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</span>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 message-view task-view ">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-end me-auto ">
                                    <div class="add-task-btn-wrapper card-title m-b-20">
                                        TIÊU ĐỀ:<br> {{' '.$task->task_title}}
                                    </div>
                                </div>
                                {{--                            <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>--}}
                                <div class="nav float-end custom-menu" style="width: 20%">
                                    <form action="{{route('task.chuyen-trang-thai',$task->id)}}" style="width: 100%;" method="post">
                                        @csrf
                                        <select name="status" class="select" onchange="this.form.submit()">
                                            @foreach($param['status'] as $i)
                                                <option {{$task->task_status_id == $i->id?"selected":""}} value="{{$i->id}}">{{$i->name}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="task-wrapper">
                                            <div class="task-list-container">
                                                <div class="task-list-body card-title m-b-20">NỘI DUNG CẦN THỰC HIỆN:
                                                    <br>
                                                    {{$task->task_description}}
                                                </div>
                                                <div class="task-list-footer">
                                                    <div class="new-task-wrapper">
                                                        <textarea id="new-task"
                                                                  placeholder="Enter new task here. . ."></textarea>
                                                        <span class="error-message hidden">You need to enter a task first</span>
                                                        <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                        <span class="btn" id="close-task-panel">Close</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-popup hide">
                                            <p>
                                                <span class="task"></span>
                                                <span class="notification-text"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="position: absolute;top: 50%;width: 100%;height: 100%">
                                    <div class="card-body">
                                        <h5 class="card-title m-b-20">LỊCH SỬ</h5>
                                        <ul class="files-list">
                                            @foreach($task->log->sortByDesc('created_at')->take(7)  as $i)
                                                <li>
                                                    <div class="files-cont">
                                                        <div class="">
                                                            <img style="width: 30px;float: left"
                                                                 src="{{asset($i->user->avatar??'uploads/avatar/avatar_defaul1.png')}}">
                                                        </div>
                                                        <div class="files-info">
                                                            <span class="file-name text-ellipsis">
                                                                <a href="#">{{$i->user->user_detail->fullname}} {{$i->type->content}}
                                                                    @if($i->log_type_id == 8)
                                                                        {{$i->log_content}}
                                                                    @else
                                                                        <?php
                                                                        //                                                          dd(json_decode($i->assign_member))
                                                                        $user = \App\Models\User::whereIn('id', json_decode($i->assign_member))->get();
                                                                        ?>
                                                                        @if($user !=null)
                                                                            @foreach($user as $key=> $ii)
                                                                                @if($key+1 == $user->count())
                                                                                    {{$ii->user_detail->fullname}}
                                                                                @else
                                                                                    {{$ii->user_detail->fullname.', '}}
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </a>
                                                            </span>
                                                            <span class="file-date">thời gian : {{App\Helper\DateHelper::datetime($i->created_at)}}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('preview-image');
            $('#preview-image').show();
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        $('.delete-member').click(function () {
            var id = $(this).data('id');
            var user_id = $(this).data('user_id');
            var user = $(this).data('user');
            // alert(id);
            Swal.fire({
                title: 'Xóa ' + user + ' khỏi task',
                text: 'Sau khi xóa sẽ xóa luôn các thông tin chi tiết',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{route('task.xoa-thanh-vien',['',''])}}/' + id + '/' + user_id;
                }
            })
        });
    </script>

@endsection
