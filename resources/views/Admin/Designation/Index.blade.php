@extends('Admin.Layouts.Master')
@section('title','Danh sách vai trò')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">DANH SÁCH CÁC VỊ TRÍ</h3>
                {{-- <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.vai-tro.danh-sach')}}">Trở lại</a></li>
                </ul> --}}
            </div>
            
        </div>
    </div>
    <form method="get" action="">
        <div class="col-auto float-start ms-auto">
            <a href="javascript:{}" data-bs-target="#add_designation" data-bs-toggle="modal"  class="btn add-btn" ><i
                    class="fa fa-plus"></i> Thêm vị trí</a>
        </div>
        <div class="row filter-row">
           <div  style="margin-right: 1pt" class="float-end ms-auto col-md-3">
                <div class="form-group form-focus">
                    <input value="{{request()->id}}" name="designation_name" type="text" class="form-control floating" >
         

                    <label class="focus-label">Nhập tên vị trí</label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group custom-select">
                    <select name="department_id" class="select floating">
                        <option value="">Chọn phòng ban</option>
                        @foreach($department as $i)
                            <option {{request()->department_id == $i->id?"selected":""}} value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach
                    </select>
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
                    <tr  style="background-color: bisque">
                        {{-- <th>Name</th>
                        <th>Email</th> --}}
                        <th>STT</th>
                        <th>Tên vị trí</th>
                        <th>Phòng ban </th>
                        <th>Ngày tạo</th>
                        {{-- <th>Role</th> --}}
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $list as $key=> $i )


                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$i->name}}</td>

                        <td>
                           {{$i->department->name}}
                        </td>
                        <td>{{$i->created_at?\App\Helper\DateHelper::datetime($i->created_at):""}}</td>
                        <td >
                            <a class="btn btn-primary" href="javascript:{}" data-bs-toggle="modal" data-bs-target="#update_designation{{$i->id}}"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>

                            <a class="btn btn-danger" onclick="delete_item('{{$i->id}}','{{route('quan-tri.vai-tro.xoa','')}}')" href="javascript:{}" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                        </td>

                        {{-- <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:{}" data-bs-target="#update_designation{{$i->id}}" data-bs-toggle="modal" data-id="{{$i->id}}">
                                        <i class="fa fa-pencil m-r-5"></i>
                                        Chỉnh sửa</a>
                                        <a class="dropdown-item" onclick="delete_item('{{$i->id}}','{{route('quan-tri.vai-tro.xoa','')}}')" href="javascript:{}" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>
                        </td> --}}
                    </tr>
                    <div id="update_designation{{$i->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">CHỈNH SỬA VỊ TRÍ</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('quan-tri.vai-tro.chinh-sua',$i->id)}}" method="post">
                                        @csrf
                                        <div class="form">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Vị trí:</h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-focus">
                                                                <input name="designation_name" type="text" class="form-control floating"
                                                                       value="{{old('designation_name')??$i->name}}" placeholder="PHP development">

                                                            </div>
                                                            @if($errors->has('designation_name'))
                                                                <span class="text-danger">{{$errors->first('designation_name')}}</span>
                                                            @endif
                                                        </div>
                                                        <h3 class="card-title">Phòng Ban:</h3>

                                                        <div class="col-md-12">
                                                            <div class="form-group form-focus">
                                                                <select name="department_id" class="select floating">
                                                                    @foreach($department as $ii)
                                                                        <option {{old('department_id')??$i->department_id==$ii->id ?"selected":""}} value="{{$ii->id}}">{{$ii->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                    

                                                            </div>
                                                            @if($errors->has('department_id'))
                                                                <span class="text-danger">{{$errors->first('department_id')}}</span>
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

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="add_designation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÊM VỊ TRÍ</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('quan-tri.vai-tro.them')}}" method="post">
                        @csrf
                        <div class="form">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Vị trí:</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <input name="designation_name" type="text" class="form-control floating"
                                                       value="{{old('designation_name')}}" placeholder="PHP development">

                                            </div>
                                            @if($errors->has('designation_name'))
                                                <span class="text-danger">{{$errors->first('designation_name')}}</span>
                                            @endif
                                        </div>
                                        <h3 class="card-title">Phòng ban:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <select name="department_id" class="select floating">
                                                    @foreach($department as $i)
                                                    <option {{old('department_id')==$i->id ?"selected":""}} value="{{$i->id}}">{{$i->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            @if($errors->has('department_id'))
                                                <span class="text-danger">{{$errors->first('department_id')}}</span>
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
    $(document).ready(function (){
        @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('add_designation'))
        $('#add_designation').modal('show');
        @endif
        @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('update_designation'))
        var id = '#update_designation'+'{{\Illuminate\Support\Facades\Session::get('update_designation')}}';
        $(id).modal('show');
        @endif
    });
</script>
@endsection
@section('style')
    <style>

    </style>
@endsection
