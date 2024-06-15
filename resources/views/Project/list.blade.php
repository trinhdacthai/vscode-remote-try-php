@extends('Admin.Layouts.Master')
@section('title','Danh sách dự án')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title text-center">DỰ ÁN CỦA TÔI</h3>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">home</a></li>
                        <li class="breadcrumb-item active">Dự án</li>
                    </ul> --}}
                </div>

            </div>
        </div>

        <form action="" method="get">
            <div class="row filter-row">

                <div style="margin-right: 1pt" class="float-end ms-auto col-md-3">
                    <div class="form-group form-focus">
                        <input name="name" value="{{request('name')}}" type="text" class="form-control floating">
                        <label class="focus-label">Nhập tên dự án</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group custom-select">
                        <select name="leader_id" class="select floating">
                            <option value="" selected>Trưởng dự án</option>
                            @foreach($param['member'] as $item)
                                <option {{request('leader_id') == $item->id ?"selected" :"" }} value="{{$item->id}}">{{$item->user_detail->fullname ?? ""}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-sm-2 col-md-3 col-auto float-end ms-auto">
                    <div class="form-group custom-select">
                        <select name="categories_id" class="select floating">
                            <option value="">Danh mục</option>
                            @foreach($param['categories'] as $item)
                                <option {{request('categories_id') == $item->id ?"selected" :"" }} value="{{$item->id}}">{{$item->categories_name}}</option>
                            @endforeach
                            <option {{request('categories_id') == '0' ?"selected" :"" }} value="0">Khác</option>
                        </select>
                    </div>
                </div> --}}
                <div class="col-sm-3 col-md-2">
                    <button type="submit" class="btn btn-success w-100"> Tìm kiếm </button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($param['list'] as $i)
                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="project-title text-center"><a href="{{route('du-an.chi-tiet',$i->project_url)}}">{{$i->project_name}}</a></h4>
                            <small class="block text-ellipsis m-b-15 text-center">
                                <ul class="badge badge-success">{{$i->task->where('task_status_id','=',4)->count()}}</span> <span > Hoàn thành</ul>
                                <ul class="badge badge-primary">{{$i->task->where('task_status_id','<>',4)->count()}}</span> <span > Đang thực hiện</ul>
                            </small>
                            {{-- <p class="text-muted">Mô tả: {{$i->project_description}}
                            </p> --}}
                            <div class="project-members m-b-15">
                                <div>Trưởng dự án:
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-bs-toggle="tooltip" title="{{$i->lead->user_detail->fullname}}"><img alt=""
                                                                                                                                   src="{{asset($i->lead->avatar??"uploads/avatar/avatar_defaul1.png")}}"></a>
                                        </li>
                                    </ul>
                                </div>
                               

                            </div>
                            <div class="project-members m-b-15">
                                <div>Thành viên:
                                    <ul class="team-members">
                                        @foreach($i->implementer as $ii)
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="{{$ii->user->user_detail->fullname}}"><img alt=""
                                                                                                                                         src="{{asset($ii->user->avatar??"uploads/avatar/avatar_defaul1.png")}}"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Ngày bắt đầu: <span class="float-end">{{App\Helper\DateHelper::date($i->date_start)}}</span>
                                </div>
                                
                            </div>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Ngày kết thúc: <span class="float-end">{{App\Helper\DateHelper::date($i->date_end)}}</span>
                                </div>

                            </div>
                           
                            
                            <?php

                            $total = \Carbon\Carbon::parse($i->date_start)->diffInDays($i->date_end);
                            $start = \Carbon\Carbon::parse()->isAfter($i->date_end) ? - \Carbon\Carbon::parse()->diffInDays($i->date_end): \Carbon\Carbon::parse()->diffInDays($i->date_end);

//                                dump ($test);
                            $times =100 - round( (( $total - $start )/$total) *100);
//                            $times = round() - (/(\Carbon\Carbon::parse($i->date_start)->diffInDays($i->date_end)))*100);
//                           dump(\Carbon\Carbon::parse()->diffInDays($i->date_end));
//                            $total1 = 100 - $times;
                            //                            $deadline =
                            ?>
                            <p class="m-b-5">Tổng thời gian:<span class=" float-end">
                                {{-- <span class="{{$times >0 ? 'text-success' :'text-danger'}}  float-end">{{$times}}%</span> --}}

                                ( {{\Carbon\Carbon::parse($i->date_start)->diffInDays($i->date_end)}} Days)
                            </p>
                            {{-- <div class="progress progress-xs mb-0 bg-danger">
                                <div class="progress-bar bg-secondary" role="progressbar" data-bs-toggle="tooltip"
                                     title="{{100 - $times}}%"
                                     style="width: {{$times >0 ?100 - $times : 100 }}%"></div>
                            </div> --}}
                            <p class="m-b-5">Quá hạn: <span class="text-danger float-end">
                                {{-- <span class="{{$times >0 ? 'text-success' :'text-danger'}}  float-end">{{$times}}%</span> --}}

                                ( {{\Carbon\Carbon::parse()->diffInDays($i->date_end)}} Ngày)
                            </p>
                            <p class="m-b-5">Tiến độ: <span class="text-success float-end">{{($i->task->where('task_status_id','=',4)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%</span></p>
                            {{-- <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                     title="{{($i->task->where('task_status_id','=',6)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%" style="width: {{($i->task->where('task_status_id','=',6)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%"></div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection
