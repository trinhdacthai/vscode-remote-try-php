@extends('Admin.Layouts.Master')
@section('title','Danh sách dự án')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title text-center">{{$item->project_name}}</h3>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Dự án</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::guard('admin')->id() == $item->lead_id)
        <div class="fixed-header">
            <div class="navbar">
                <div class="float-start me-auto">
                    <div class="col-auto float-start ms-auto">
                        <a href="" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_tasks"><i
                        class="fa fa-plus"></i> Thêm công việc </a>
                    </div>
                    {{-- <div class="add-task-btn-wrapper">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#add_tasks" class="add-task-btn btn btn-white btn-sm">
                            Thêm công việc
                            </button>
                    </div> --}}
                </div>

            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card project-user">
                    
                </div>
                <div class="card project-user">
                    <div class="card-body">
                        <h6 class="card-title m-b-20">Trưởng dự án</h6>
                        <ul class="list-box">
                            <li>
                                <a href="{{route('du-an.chi-tiet',[ $item->project_url, $item->lead->user_name])}}">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="{{asset($item->lead->avatar ?? 'uploads/avatar/avatar_defaul1.png')}}"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">{{$item->lead->user_detail->fullname}}</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">{{$item->lead->designation->name??'leader'}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title m-b-20">
                            Thành viên  
                            <button type="button" class="float-end btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add_member"><i class="fa fa-plus"></i> Thêm </button>
                        </h6>
                        <ul class="list-box">
                            @foreach($item->implementer as $i)
                            <li>
                                <a href="{{route('du-an.chi-tiet',[ $item->project_url, $i->user->user_name])}}">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="{{asset($i->user->avatar??'uploads/avatar/avatar_defaul1.png')}}"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">{{$i->user->user_detail->fullname}}</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">{{$i->user->designation->name??"Không có"}}</span>
                                        </div>
                                        <div style="float: right;margin-top: -40px"><a  href="javascript:{}" data-project_url="{{$item->project_url}}" data-user="{{$i->user->user_detail->fullname}}"  data-id="{{$i->id}}" class="btn btn-danger delete_member fa fa-trash-o m-r-5"> Xóa</a></div>
                                    </div>
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="add_member" class="modal custom-modal fade " role="dialog" aria-modal="true" style="display: none; padding-left: 0px;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm thành viên vào dự án</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('du-an.them-thanh-vien',$item->project_url)}}" method="post">
                                    @csrf
                                <div class="input-group m-b-30">
{{--                                    <input placeholder="Search to add" class="form-control search-input" type="text">--}}
{{--                                    <button class="btn btn-primary">Search</button>--}}
                                </div>
                                <div>
                                    <select name="member[]" class="select select_member" multiple="multiple">
                                        @foreach($param['member'] as $i)
                                        <option value="{{$i->id}}">{{!empty($i->user_detail->fullname) ? $i->user_detail->fullname  : 'Tài khoản đã xóa'  }}</option>
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
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title m-b-15">Chi tiết dự án</h6>
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>Trưởng dự án:</td>
                                    <td class="text-end"><a href="">{{$item->lead->user_detail->fullname}}</a></td>
                                </tr>
                            <tr>
                                <td>Ngày bắt đầu:</td>
                                <td class="text-end">{{App\Helper\DateHelper::date($item->date_start)}}</td>
                            </tr>
                            <tr>
                                <td>Ngày kết thúc:</td>
                                <td class="text-end">{{App\Helper\DateHelper::date($item->date_end)}}</td>
                            </tr>
                            <tr>
                                <td>Độ quan trọng :</td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        @if($item->priority == 2 )
                                        <div href="#" class="badge badge-danger">Cao</div>
                                        @elseif($item->priority ==1)
                                        <div href="#" class="badge badge-success">Trung bình</div>
                                        @else
                                        <div href="#" class="badge badge-primary">Thấp</div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Trạng thái:</td>
                                <td class="text-end">
                                    @if($item->task->count()-$item->task->where('task_status_id','=',4)->count()==0)
                                        Đã hoàn thành
                                   @elseif($item->date_end > \Carbon\Carbon::now())
                                        Đang hoạt động
                                    @elseif($item->date_end < \Carbon\Carbon::now())
                                        Quá hạn
                                    @endif
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                        <p class="m-b-5">Tiến độ:<span class="text-success float-end">{{number_format(($item->task->where('task_status_id','=',4)->count()/($item->task->count()!=0?$item->task->count():1))*100,0,'',',')}}%</span></p>
                    </div>
                </div>

            </div>
            
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="project-title">
                            {{-- <h3 class="card-title">{{$item->project_name}}</h3> --}}
                            <h4>Chi tiết dự án</h4>
                        <p>{{$item->project_description}}</p>
                            <h4> Trạng thái dự án</h4>
                            <span class="badge badge-success">{{count($complete_task)}}<span> Hoàn thành</span></span>
                            <span class="badge badge-primary">{{count($pending_task)}}<span> Đang thực hiện </span></span><br>
                        </div>
                    </div>
                </div>
                <div class="project-task">
                    <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                        @if(!$view_user)
                        <li class="nav-item"><a class="nav-link active" href="#only_me" data-bs-toggle="tab" aria-expanded="true">Của tôi</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link " href="#all_tasks" data-bs-toggle="tab" aria-expanded="false">Tất cả</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pending_tasks" data-bs-toggle="tab" aria-expanded="false">Đang làm</a></li>
                        <li class="nav-item"><a class="nav-link" href="#completed_tasks" data-bs-toggle="tab" aria-expanded="false">Đã hoàn thành</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="only_me">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            @if(!$view_user)
                                                @foreach($all_task as $i)
                                                    <?php
                                                    $array = [];
                                                    foreach ($i->task_implementer as $ii){
                                                        array_push($array,$ii->user_id);
                                                    }
                                                    $check = false;
                                                    if(in_array(\Illuminate\Support\Facades\Auth::guard('admin')->id(),$array)){
                                                        $check = true;
                                                    }
                                                    ?>
                                                    @if($check == true)
                                                        <x-home.task :type="'a'" :id="$i->id"></x-home.task>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="all_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            @foreach($all_task as $i)
                                                <x-home.task :type="'b'" :id="$i->id"></x-home.task>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pending_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            @foreach($pending_task as $i)
                                                <x-home.task :type="'c'" :id="$i->id"></x-home.task>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="completed_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            @foreach($complete_task as $i)
                                                <x-home.task :type="'d'" :id="$i->id"></x-home.task>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
               
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-20">Lịch sử</h5>
                        <ul class="files-list">
                            @foreach($param['log_project']  as $i)
                            <li>
                                <div class="files-cont">
                                    <div class="">
                                        <img style="width: 30px;float: left" src="{{asset($i->user->avatar??'uploads/avatar/avatar_defaul1.png')}}"
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis"><a href="#">{{$i->user->user_detail->fullname}} {{$i->type->content}}
                                            @if($i->log_type_id == 1 ||$i->log_type_id == 2||$i->log_type_id == 3)
                                            {{$i->log_content}}
                                                @else
                                                    <?php
//                                                          dd(json_decode($i->assign_member))
                                                        $user = \App\Models\User::whereIn('id',json_decode($i->assign_member))->get();
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

                                            </a></span>
                                        <span class="file-date">Thời gian : {{App\Helper\DateHelper::datetime($i->created_at)}}</span>

                                    </div>
                                    {{-- <ul class="files-action">
                                        <li class="dropdown dropdown-action">
                                            <a href="" class="dropdown-toggle btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#share_files">Share</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            </div>
                                        </li>
                                    </ul> --}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>

        <div id="add_tasks" class="modal custom-modal fade " role="dialog" aria-modal="true" style="display: none; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">THÊM CÔNG VIỆC</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('du-an.them-task',$item->project_url)}}" method="post" enctype="">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="task_title" required type="text" class="form-control">
                            </div><div class="form-group">
                                <label>Nội dung chi tiết công việc</label>
                                <textarea type="text" name="task_description" required class="form-control"></textarea>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-lg">LƯU</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script>
    $('.select_member').select2();
    $('.delete_member').click(function (){
        var id = $(this).data('id');
        var user = $(this).data('user');
        var project_url = $(this).data('project_url');
        // alert(id);
        Swal.fire({
            title: 'Xóa '+user+' khỏi dự án',
            text: 'Sau khi xóa thì không thể hoàn tác',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Không',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='{{route('du-an.xoa-thanh-vien',['',''])}}/'+project_url+'/'+id;
            }
        })
    });
    $('.delete_task').click(function (){
        var id = $(this).data('id');
        var user = $(this).data('user');
        var project_url = $(this).data('project_url');
        Swal.fire({
            title: 'Xóa công việc ra khỏi dự án',
            text: 'Sau khi xóa sẽ xóa luôn các thông tin chi tiết',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Không',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='{{route('du-an.xoa-task',['',''])}}/'+project_url+'/'+id;
            }
        })
    });
</script>
@endsection
