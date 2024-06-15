@extends('Admin.Layouts.Master')
@section('title','Nhân viên đã xóa')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Nhân viên</h3>
                <ul class="breadcrumb">
{{--                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>--}}
                    <li class="breadcrumb-item active">Danh sách đã xóa</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="{{route('quan-tri.phan-quyen.them-quyen')}}"   class="btn add-btn" ><i
                        class="fa fa-plus"></i>Thêm</a>
            </div>
        </div>
    </div>
    <form action="" method="get">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group form-focus">
                    <input value="{{request()->key}}" type="text" name="key" class="form-control floating">
                    <label class="focus-label">Name</label>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-success w-100"> Tìm kiếm </button>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Tài khoản</th>
                        <th>Vai trò</th>
                        <th class="text-end">Thao tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($param['list'] as $key=> $i )
                        <tr>
                            <td>{{$key+1}}</td>

                            <td>{{$i->user_detail->fullname}}</td>
                            <td>{{$i->user_name}}</td>
                            <td>{{$i->designation->name??"Không có"}}</td>
{{--                            <td>{{\App\Helper\DateHelper::datetime($i->created_at)}}</td>--}}
{{--                            <td>{{$i->user->user_detail->fullname}}</td>--}}
                            {{--                            <td>{{$i->address}}</td>--}}
                            {{--                            <td><button class="btn btn-outline-secondary" data-bs-target="#view_project{{$i->id}}" data-bs-toggle="modal">Xem</button></td>--}}
                            <td class="text-end">
                                <a class=" btn btn-success" href="javascript:{}" onclick="refresh_item('{{$i->id}}','{{route('quan-tri.nhan-vien-da-xoa.khoi-phuc','')}}')"><i
                                        class="fa fa-refresh m-r-5"></i>Khôi phục</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="add_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('quan-tri.phong-ban.them')}}" method="post">
                        @csrf
                        <div class="form">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Thông tin</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <input name="department_name" type="text" class="form-control floating"
                                                       value="{{old('department_name')}}" placeholder="PHP development">
                                                <label class="focus-label">Thông tin học vấn</label>

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
                            <button class="btn btn-primary submit-btn">Lưu</button>
                        </div>
                    </form>
                </div>
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
