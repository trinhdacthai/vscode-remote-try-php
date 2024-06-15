@extends('Admin.Layouts.Master')
@section('title','Thống kê dữ liệu')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="page-title text-center">TRANG THỐNG KÊ   
                    
                </ul>
                <ul class="text-center">Ngày: {{\Carbon\Carbon::parse()->format('d/m/Y')}}
                    
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="row" >
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body" style="background-color:bisque">
                            <h3 class="card-title">Tổng thu</h3>
                            <div id="bar-charts"><span class="text-success">{{number_format($total,0,'','.')}} VNĐ</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body"style="background-color:bisque">
                            <h3 class="card-title">Tổng chi</h3>
                            <div id="line-charts"><span class="text-danger">{{number_format($desc,0,'','.')}} VNĐ</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card dash-widget ">
                <div class="card-body">
                    <div class="dash-widget-info text-center">
                        <span class="card-title">Tổng dự án</span>
                        <h3>{{$project->count()}}</h3>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="dash-widget-info text-center">
                        <span class="card-title">Tổng khách hàng</span>
                        <h3>{{$customer->count()}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="dash-widget-info text-center">
                        <span >Tổng nhiệm vụ</span>
                        <h3>{{$task->count()}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="dash-widget-info text-center">
                        <span class="card-title">Tổng nhân viên</span>
                        <h3>{{$admin->count()}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <h4 class="card-title text-center">Trạng thái công việc</h4>
                    <div class="statistics">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box mb-4" style="background-color:bisque">
                                    <p class="card-title">Tổng nhiệm vụ</p>
                                    <h3>{{$task->count()}}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box mb-4"style="background-color:bisque">
                                    <p>Đang thực hiện</p>
                                    <h3>{{$task->where('task_status_id','<>',4)->count()}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-left: 260pt" >
                        <li>Đang làm
                            <span class="float-end">{{$task->where('task_status_id','==',2)->count()}}
                            </span></li>
                        <li>Hoàn thành 
                            <span class="float-end">{{$task->where('task_status_id','==',4)->count()}}
                            </span></li>
                        <li>Lỗi
                            <span class="float-end">{{$task->where('task_status_id','==',3)->count()}}
                                </span></li>
                        <li>Đang chờ
                            <span
                                class="float-end">{{$task->where('task_status_id','==',1)->count()}}
                            </span></li>

                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-8 d-flex">
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h3 class="card-title mb-0">Hóa đơn</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Loại hóa đơn</th>
                                <th>Thời gian</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice as $i)
                            <tr>
                                <td>{{$i->id}}</td>
                                <td>
                                   {{$i->user->customer_name??"---"}}
                                </td>
                                <td>{{$i->type==0?"Thu":"Chi"}}</td>
                                <td>{{\App\Helper\DateHelper::datetime($i->created_at)}}</td>
                                <td>{{number_format($i->total,0,'','.')}} VNĐ</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('quan-tri.hoa-don.danh-sach')}}">Xem tất cả</a>
                </div>
            </div>
        </div> --}}
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
