@extends('Admin.Layouts.Master')
@section('title','Danh sách nhân viên')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">DANH SÁCH NHÂN VIÊN</h3>
                
            </div>
            
        </div>
    </div>
    <form method="get" action="">
        <div class="col-auto float-start ms-auto">
            <a href="{{route('quan-tri.quan-ly-nhan-vien.them')}}" class="btn add-btn"><i
                        class="fa fa-plus"></i> Thêm </a>
            </div>
        <div class="row filter-row ">
            {{-- <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <input value="{{request()->id}}" type="text" name="id" class="form-control floating">
                    <label class="focus-label">Nhập STT</label>
                </div>
            </div> --}}
            <div style="margin-right: 1pt" class="float-end ms-auto col-md-3">
                <div class="form-group form-focus">
                    <input  value="{{request()->fullname}}" name="fullname" type="text" class="form-control floating">
                    <label class="focus-label">Nhập tên nhân viên</label>
                </div>
            </div>
            <div   class=" col-md-3">
                <div  class="form-group custom-select">
                    <select name="designation" class="select floating">
                        <option value="">Bộ phận</option>
                        @foreach($param['department']  as $i)
                            <optgroup label="{{$i->name}}"></optgroup>
                            @foreach($i->designation as $ii)
                                <option {{request()->designation == $ii->id ?"selected":""}} value="{{$ii->id}}">{{$ii->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <div class="d-grid">
                    <button type="submit" class="btn btn-success"> Tìm Kiếm</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table custom-table " >
                    <thead>
                    <tr style="background-color: bisque">
                        <th >STT</th>
                        <th>Tên</th>
                        <th>Tài khoản</th>
                        <th>Email</th>
                        <th>Ngày sinh</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>
                        <th >Thao tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($param['list'] as $key => $i )
                        <tr>
                            <td>{{$key+1}}</td>

                            <td><button class="btn secondary" data-bs-target="#view_employee{{$i->id}}" data-bs-toggle="modal">{{$i->user_detail->fullname}}</button></td>
                            <td>{{$i->user_name}}</td>
                            <td>{{$i->email}}</td>
                            <td>{{($i->user_detail->birthday)?App\Helper\DateHelper::date($i->user_detail->birthday):""}}</td>


                            <td>{{$i->designation->name??"Không có"}}</td>
                            <td>
                                @if($i->is_active == 0)
                                    <a class="btn btn-danger" data-id="{{$i->id}}" onclick="active('{{$i->id}}','{{route('quan-tri.quan-ly-nhan-vien.kich-hoat','')}}')" href="javascript:{}">Chưa kích hoạt</a>
                                @else
                                    <a class="btn btn-success" data-id="{{$i->id}}" onclick="unactive('{{$i->id}}','{{route('quan-tri.quan-ly-nhan-vien.huy-kich-hoat','')}}')" href="javascript:{}"><i class="fa fa-check m-r-5"></i> Đang kích hoạt</a>
                                @endif
                            </td>
                            <td >
{{--                                <a class=" btn btn-success" href="javascript:{}" onclick="refresh_item('{{$i->id}}','{{route('quan-tri.nhan-vien-da-xoa.khoi-phuc','')}}')"><i class="fa fa-refresh m-r-5"></i>Khôi phục</a>--}}

                                {{-- <a class=" btn btn-success" href="javascript:{}" data-bs-toggle="modal"
                                   data-bs-target="#view_employee{{$i->id}}"><i class="fa fa-refresh m-r-5"></i>Xem</a> --}}
                                <a class="btn btn-primary" href="{{route('quan-tri.quan-ly-nhan-vien.chinh-sua',$i->id)}}" ><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>

                                {{-- <a class="btn btn-danger" onclick="delete_item('{{$i->id}}','{{route('quan-tri.quan-ly-nhan-vien.xoa','')}}')" href="javascript:{}" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @foreach($param['list'] as $key => $i) 
                    <div id="view_employee{{$i->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">CHI TIẾT NHÂN VIÊN</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Mã nhân viên</label>
                                                    <h4>{{$i->user_code}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Tài khoản</label>
                                                    <h4>{{$i->user_name}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Họ và tên</label>
                                                    <h4 style="">{{$i->user_detail->fullname}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Ngày sinh</label>
                                                    <h4 style="">{{($i->user_detail->birthday)?App\Helper\DateHelper::date($i->user_detail->birthday):""}}</h4>

                                                </div>
                                            </div><div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Địa chỉ</label>
                                                    <h4 style="">{{($i->user_detail->address)??""}}</h4>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Số chứng minh</label>
                                                    <h4 style="">{{($i->user_detail->identity_number??"")}}</h4>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Email</label>
                                                    <h4 style="">{{$i->email}}</h4>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Số điện thoại</label>
                                                    <h4 style="">{{$i->phone}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Giới tính</label>
                                                    <h4 style="">
                                                        @if($i->user_detail->gender == 0 ) Không xác định @endif
                                                        @if($i->user_detail->gender == 1 ) Nam @endif
                                                        @if($i->user_detail->gender == 2 ) Nữ @endif
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Vị trí</label>
                                                    <h4 style="">{{$i->designation->name??""}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Trạng thái</label>
                                                    <h4 style="">{{$i->is_active == 1?"Kích hoạt":"Chưa kích hoạt"}}</h4>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Ngày tham gia</label>
                                                    <h4 >{{\Illuminate\Support\Carbon::parse($i->created_at)->format('d/m/Y')}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @if($i->education->count() > 0)
                                            <div class="table-responsive m-t-15">
                                                <label>Học vấn</label>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th class="text-center">Đơn vị</th>
                                                        <th class="text-center">Từ</th>
                                                        <th class="text-center">Đến</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($i->education as $key_ => $ii)
                                                            <tr>
                                                                <td>{{$key_ + 1}}</td>
                                                                <td class="text-center">
                                                                    {{$ii->education_content}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{\App\Helper\DateHelper::month_year($ii->date_start)}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{\App\Helper\DateHelper::month_year($ii->date_end)}}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                        @if($i->experience->count() > 0)
                                            <div class="table-responsive m-t-15">
                                                <label>Kinh nghiệm làm việc</label>
                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th class="text-center">Vị trí</th>
                                                            <th class="text-center">Đơn vị</th>
                                                            <th class="text-center">Từ</th>
                                                            <th class="text-center">Đến</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($i->experience as $key_ => $ii)
                                                            <tr>
                                                                <td>{{$key_ + 1}}</td>
                                                                <td class="text-center">
                                                                    {{$ii->designation}}
                                                                </td><td class="text-center">
                                                                    {{$ii->workplace}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{\App\Helper\DateHelper::month_year($ii->date_start)}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{\App\Helper\DateHelper::month_year($ii->date_end)}}
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="button" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('system/js/main.js')}}"></script>
@endsection
@section('style')
    <style>

    </style>
@endsection
