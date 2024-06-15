@extends('Admin.Layouts.Master')
@section('title','Sửa quyền')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">CHỈNH SỬA QUYỀN</h3>
                <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.phan-quyen.danh-sach')}}">Trở lại</a></li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">


            </div>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <div class="row"> --}}
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label class="card-title">Tên quyền</label>
                    <input name="role_name" value="{{old('role_name')??$role->role_name}}" class="form-control" type="text">
                    @if($errors->has('role_name'))
                        <span class="text-danger">{{$errors->first('role_name')}}</span>
                    @endif
                </div>
            </div> --}}
            {{-- <div class="col-sm-6">
                <label class="card-title">Chọn quyền</label>
                @foreach($page_role as $i)

                    <div class="form-group">
                        @if($i->is_page !=1 )
                            {{--                    <input type="checkbox" class="form-check-input">--}}
                            {{-- <h4 class="text-primary">{{$i->page_name}}</h4>
                            {{--                        <label class="form-check-label">{{$i->page_name}}</label>--}}
                        {{-- @endif

                    </div>
                    @if($i->child->count()>0)
                        @foreach($i->child as $ii)

                            <div class="form-group">

                                <input id="page{{$ii->id}}" {{in_array($ii->id,unserialize($role->role_permission))?"checked":""}} value="{{$ii->id}}" name="page[]" type="checkbox" class="form-check-input">

                                <label for="page{{$ii->id}}" class="form-check-label">{{$ii->page_name}}</label>
                            </div>
                        @endforeach
                    @endif
                @endforeach
                <h4 class="text-success">Trang đơn</h4>
                @foreach($page->where('is_page',1) as $i)
                    <div class="form-group">
                        <input id="page{{$i->id}}" value="{{$i->id}}" {{in_array($i->id,unserialize($role->role_permission))?"checked":""}} name="page[]" type="checkbox" class="form-check-input">

                        <label for="page{{$i->id}}" class="form-check-label">{{$i->page_name}}</label>
                    </div>
                @endforeach
                @if($errors->has('page'))
                    <span class="text-danger">{{$errors->first('page')}}</span>
                @endif
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="card-title">Tên quyền</label>
                    <input name="role_name" value="{{old('role_name')??$role->role_name}}" class="form-control" type="text">
                    @if($errors->has('role_name'))
                        <span class="text-danger">{{$errors->first('role_name')}}</span>
                    @endif
                </div>
            </div> --}} 
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table custom-table ">
                            <thead>
                            <tr   style="background-color: rgb(237, 231, 224)">
                                <th> 
                                    <div class="col-sm-6 text-top">
                                        <div class="form-group">
                                        <label class="card-title">Tên quyền</label>
                                        <input name="role_name" value="{{old('role_name')??$role->role_name}}" class="form-control" type="text">
                                        @if($errors->has('role_name'))
                                            <span class="text-danger">{{$errors->first('role_name')}}</span>
                                        @endif
                                        </div>    
                                    </div>
                                </th>            
                                <th>
                                    @foreach($page->where('is_page',1) as $i)
                                        <div class="form-group">
                                            <input id="page{{$i->id}}" value="{{$i->id}}" {{in_array($i->id,unserialize($role->role_permission))?"checked":""}} name="page[]" type="checkbox" class="form-check-input">

                                            <label for="page{{$i->id}}" class="form-check-label">{{$i->page_name}}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('page'))
                                        <span class="text-danger">{{$errors->first('page')}}</span>
                                    @endif
                                    @foreach($page_role as $i)

                                    <div class="form-group">
                                        @if($i->is_page !=1 )
                                            {{--                    <input type="checkbox" class="form-check-input">--}}
                                            <h4 class="text-success">{{$i->page_name}}</h4>
                                            {{--                        <label class="form-check-label">{{$i->page_name}}</label>--}}
                                        @endif
                
                                    </div>
                                    @if($i->child->count()>0)
                                        @foreach($i->child as $ii)
                
                                            <div class="form-group">
                
                                                <input id="page{{$ii->id}}" {{in_array($ii->id,unserialize($role->role_permission))?"checked":""}} value="{{$ii->id}}" name="page[]" type="checkbox" class="form-check-input">
                
                                                <label for="page{{$ii->id}}" class="form-check-label">{{$ii->page_name}}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn">CẬP NHẬT</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    {{--    <script>--}}
    {{--        var loadFile = function (event) {--}}
    {{--            var output = document.getElementById('output');--}}
    {{--            output.src = URL.createObjectURL(event.target.files[0]);--}}
    {{--            output.onload = function () {--}}
    {{--                URL.revokeObjectURL(output.src) // free memory--}}
    {{--            }--}}
    {{--        };--}}
    {{--    </script>--}}
@endsection
