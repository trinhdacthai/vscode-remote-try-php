@extends('Admin.Layouts.Master')
@section('title','Danh sách khách hàng')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">DANH SÁCH KHÁCH HÀNG</h3>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách khách hàng</li>
                </ul> --}}
            </div>
            
        </div>
    </div>
    <form action="" method="get">
        <div class="col-auto float-start ms-auto">
            <a href="{{route('quan-tri.khach-hang.them')}}"   class="btn add-btn" ><i
                    class="fa fa-plus"></i>Thêm</a>
        </div>
        <div class="row filter-row">
            <div class="col-sm-2 col-md-3 col-auto float-end ms-auto">
                <div class="form-group form-focus">
                    <input value="{{request()->key}}" type="text" name="key" class="form-control floating">
                    <label class="focus-label">Nhập tên khách hàng</label>
                </div>
            </div>

            <div class="col-sm-6 col-md-2">
                <button type="submit" class="btn btn-success w-100"> Tìm kiếm </button>
            </div>

        </div>
    </form>
        <div class="col-md-12" >
            <div class="table-responsive">
                <table class="table custom-table" >
                    <thead>
                    <tr  style="background-color: bisque">
                        <th>STT</th>
                        {{-- <th>Dự án</th> --}}
                        {{-- <th>Ảnh</th> --}}
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                         <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($list as $key=> $i )
                        <tr>
                            <td>{{$key+1}}</td>

                            {{-- <td><img style="width: 30px" src="{{asset($i->avatar??'uploads/avatar/avatar_defaul.jpg')}}"></td> --}}
                            <td><button class="btn secondary" data-bs-target="#view_project{{$i->id}}" data-bs-toggle="modal">{{$i->customer_name}}</button></td>
                            <td>{{$i->email}}</td>
                            <td>{{$i->phone}}</td>
                            <td>{{$i->address}}</td>
                            <td >
                                <a class="btn btn-primary" href="{{route('quan-tri.khach-hang.chinh-sua',$i->id)}}" ><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>

                                <a class="btn btn-danger" onclick="delete_item('{{$i->id}}','{{route('quan-tri.khach-hang.xoa','')}}')" href="javascript:{}" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                            </td>
                            {{-- <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('quan-tri.khach-hang.chinh-sua',$i->id)}}"
                                          ><i class="fa fa-pencil m-r-5"></i>
                                            Chỉnh sửa</a>
                                        <a class="dropdown-item" href="javascript:{}" onclick="delete_item('{{$i->id}}','{{route('quan-tri.khach-hang.xoa','')}}')"><i
                                                class="fa fa-trash-o m-r-5"></i>Xóa</a>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                        <div id="view_project{{$i->id}}" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">CÁC DỰ ÁN</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form">
                                                <div class="card">
                                                    <div class="card-body">
{{--                                                        <h3 class="card-title">Thông tin</h3>--}}
                                                         <ul>
                                                            @if($i->project->count()>0)
                                                            @foreach($i->project as $ii)
                                                                <li>{{$ii->project_name}}</li>
                                                            @endforeach
                                                            @else
                                                                <p>Chưa có dự án</p>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="submit-section">
                                                <button data-bs-dismiss="modal" class="btn btn-primary submit-btn">Thoát</button>
                                            </div>

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
