@extends('Admin.Layouts.Master')
@section('title','Lương nhân viên')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">DANH SÁCH LƯƠNG NHÂN VIÊN</h3>
                <h3 class="page-title text-center">THÁNG {{\Carbon\Carbon::parse()->format('m')}}</h3>

    
            </div>

        </div>
    </div>
    <form action="" method="get">
        <div class="row filter-row">
            <div class="col-sm-2 col-md-3 col-auto float-end ms-auto">
                <div class="form-group form-focus">
                    <input value="{{request()->key}}" type="text" name="key" class="form-control floating">
                    <label class="focus-label">Nhập tên nhân viên</label>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <button type="submit" class="btn btn-success w-100"> Tìm kiếm </button>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table  custom-table ">
                    <thead>
                    <tr style="background-color: bisque">
                        <th>STT</th>
                        <th>Tài khoản</th>
                        <th>Họ tên</th>
                        <th>Lương cơ bản</th>
                        {{-- <th>Số tài khoản</th>
                        <th>Tên ngân hàng</th>
                        <th>Chủ tài khoản</th> --}}
                        <th>Tháng này</th>
                        <th style="text-end">Thao tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($list as $key=> $i )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$i->user_name}}</td>
                            <td>{{$i->user_detail->fullname}}</td>
                            <td>{{$i->salary?number_format($i->salary,0,'','.').' VNĐ':"---"}}</td>
                            {{-- <td>{{$i->bank->bank_number??"---"}}</td>
                            <td>{{$i->bank->bank_name??"---"}}</td>
                            <td>{{$i->bank->bank_author??"---"}}</td> --}}
                            <td>{{$i->salary_month?"Đã nhận":"---"}}</td>
                            <td >
                                {{--                                <a class=" btn btn-success" href="javascript:{}" onclick="refresh_item('{{$i->id}}','{{route('quan-tri.nhan-vien-da-xoa.khoi-phuc','')}}')"><i class="fa fa-refresh m-r-5"></i>Khôi phục</a>--}}

                                                                <a class="btn btn-primary" data-bs-target="#update_salary{{$i->id}}" data-bs-toggle="modal" href="javascript" ><i class="fa fa-pencil m-r-5"></i>Cập nhật</a>
                                                                <a class=" btn btn-success" data-bs-target="#add_salary{{$i->id}}" data-bs-toggle="modal" href="javascript:{}"  ><i class="fa fa-money m-r-5"></i>Tạo phiếu lương</a>
                                                                                            </td>
                            {{-- <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-bs-target="#update_salary{{$i->id}}" data-bs-toggle="modal" href="javascript"
                                        ><i class="fa fa-pencil m-r-5"></i>
                                            Cập nhật lương</a>
                                        @if(!$i->salary_month)
                                        <a class="dropdown-item" data-bs-target="#add_salary{{$i->id}}" data-bs-toggle="modal" href="javascript"
                                        ><i class="fa fa-money m-r-5"></i>
                                            Tạo phiếu lương</a>
                                        @endif
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                        <div id="update_salary{{$i->id}}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">CẬP NHẬT LƯƠNG</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('quan-tri.luong-nhan-vien.cap-nhat-luong',$i->id)}}" method="post">
                                            @csrf
                                            <div class="form">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Lương cơ bản:</h3>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-focus">
                                                                    <input name="salary" type="number" class="form-control floating"
                                                                           value="{{$i->salary}}" >

                                                                </div>
                                                                @if($errors->has('department_name'))
                                                                    <span class="text-danger">{{$errors->first('department_name')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn">CẬP NHẬT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="add_salary{{$i->id}}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">TẠO PHIẾU LƯƠNG</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('quan-tri.luong-nhan-vien.tao-phieu-luong',$i->id)}}" method="post">
                                            @csrf
                                            <div class="form">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Lương cơ bản:</h3>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-focus">
                                                                    <input readonly name="" type="text" class="form-control floating"
                                                                           value="{{number_format($i->salary,0,'','.').' VNĐ'}}" >
                                                                </div>

                                                            </div>
                                                            <h3 class="card-title">Số ngày nghỉ:</h3>

                                                            <div class="col-md-12">
                                                                <div class="form-group form-focus">
                                                                    <input  name="total_off" type="number" class="form-control floating"
                                                                           value="" >
                                                                </div>

                                                            </div>
                                                            <h3 class="card-title">Tiền thưởng:</h3>

                                                            <div class="col-md-12">
                                                                <div class="form-group form-focus">
                                                                    <input  name="bonus" type="number" class="form-control floating"
                                                                           value="">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn">Tạo</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('system/js/main.js')}}"></script>
    <script>

    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection
