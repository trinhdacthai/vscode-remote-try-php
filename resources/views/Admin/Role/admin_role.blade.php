@extends('Admin.Layouts.Master')
@section('title','Danh sách khách hàng')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">DANH SÁCH PHÂN QUYỀN</h3>
       
            </div>

        </div>
    </div>
    <form action="" method="get">
        <div class="row filter-row">
            <div class="col-sm-2 col-md-3 col-auto float-end ms-auto">
                <div class="form-group form-focus">
                    <input value="{{request()->username}}" type="text" name="username" class="form-control floating">
                    <label class="focus-label">Nhập tên quyền</label>
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <button type="submit" class="btn btn-success w-100"> Tìm kiếm</button>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table custom-table ">
                    <thead>
                    <tr   style="background-color: bisque" >
                        <th>STT</th>
                        <th>Tài khoản</th>
                        <th>Quyền</th>

                        <th class="text-end">Thao tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($user as $key=> $i )
                        <tr>
                            <td>{{$key+1}}</td>
                            {{--                            <td><img style="width: 30px" src="{{asset($i->avatar??'uploads/avatar/avatar_defaul.png')}}"></td>--}}
                            <td>{{$i->user_name}}</td>
                            <td>{{$i->role->role_name??"Chưa có quyền"}}</td>

                            <td class="text-end">
                                {{-- <a href="#" data-bs-target="#update_role{{$i->id}}" data-bs-toggle="modal" class="btn btn-success">Sửa quyền</a> --}}
                                <a class="btn btn-primary" href="#" data-bs-target="#update_role{{$i->id}}" data-bs-toggle="modal"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                            </td>
                        </tr>
                        <div id="update_role{{$i->id}}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Chỉnh sửa quyền</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('quan-tri.phan-quyen-quan-tri.cap-nhat',$i->id)}}" method="post">
                                            @csrf
                                            <div class="form">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Thông tin</h3>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-focus">
                                                                    <select name="role_id" class="select">
                                                                        <option value="">Chọn quyền</option>
                                                                        @foreach($role as $item)
                                                                        <option value="{{$item->id}}">{{$item->role_name}}</option>
                                                                        @endforeach
                                                                    </select>
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
