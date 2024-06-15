@extends('Admin.Layouts.Master')
@section('title','Thêm quyền')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">THÊM QUYỀN</h3>
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

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table custom-table ">
                        <thead>
                        <tr   style="background-color: rgb(237, 231, 224)">
                            <th> 
                                <div class="col-sm-6 text-top">
                                    <div class="form-group">
                                    <label class="card-title">Nhập tên quyền</label>
                                    <input name="role_name" value="{{old('role_name')}}" class="form-control" type="text">
                                    @if($errors->has('role_name'))
                                        <span class="text-danger">{{$errors->first('role_name')}}</span>
                                    @endif
                                    </div>    
                                </div>
                            </th> 
                            <th>
                                <div class="col-sm-6">
                                    <h4 class="text-success">Trang đơn</h4>
                                    @foreach($page->where('is_page',1) as $i)
                                        <div class="form-group">
                                            <input id="page{{$i->id}}" value="{{$i->id}}" name="page[]" type="checkbox" class="form-check-input">
                    
                                            <label for="page{{$i->id}}" class="form-check-label">{{$i->page_name}}</label>
                                        </div>
                                    @endforeach
                                    @foreach($page_role as $i)
                                    
                    
                                    <div class="form-group">
                                        @if($i->is_page !=1 )
                                            <h4 class="text-success">{{$i->page_name}}</h4>
                                        @endif
                                    </div>
                                    @if($i->child->count()>0)
                                    @foreach($i->child as $ii)
                    
                                                <div class="form-group">
                    
                                                <input id="page{{$ii->id}}" value="{{$ii->id}}" name="page[]" type="checkbox" class="form-check-input">
                    
                                                <label for="page{{$ii->id}}" class="form-check-label">{{$ii->page_name}}</label>
                                                </div>
                                            @endforeach
                                    @endif
                                    @endforeach
                                    
                                    @if($errors->has('page'))
                                        <span class="text-danger">{{$errors->first('page')}}</span>
                                    @endif
                                </div>
                            </th>           
                            
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <button class="btn btn-primary submit-btn">LƯU</button>
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
