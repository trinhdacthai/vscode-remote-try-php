@extends('Admin.Layouts.Master')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center"> THÊM DỰ ÁN MỚI</h3>
                <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.du-an.danh-sach')}}">Trở lại</a></li>
                </ul>
            </div>
            {{-- <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create_project"><i
                        class="fa fa-plus"></i> Create Project</a>
                <div class="view-icons">
                    <a href="projects" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    <a href="project_list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                </div>
            </div> --}}
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Tên dự án:<span
                        class="text-danger">*</span></label>
                    <input name="project_name" value="{{old('project_name')}}" class="form-control" type="text">
                    @if($errors->has('project_name'))
                    <span class="text-danger">{{$errors->first('project_name')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Khách hàng:<span
                        class="text-danger">*</span></label>
                    <select name="customer_id" class="select">
                        <option value="">Chọn khách hàng</option>
                        @foreach( $param['customer'] as $i)
                        <option {{old('customer_id')==$i->id?"selected":""}} value="{{$i->id}}">{{$i->customer_name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer_id'))
                        <span class="text-danger">{{$errors->first('customer_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Ngày bắt đầu:<span
                        class="text-danger">*</span></label>
                    <div class="cal-icon">
                        <input id="date_start" value="{{old('date_start')}}" name="date_start" class="form-control date_start datetimepicker" type="text">
                        @if($errors->has('date_start'))
                            <span class="text-danger">{{$errors->first('date_start')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Ngày kết thúc:<span
                        class="text-danger">*</span></label>
                    <div class="cal-icon">
                        <input id="date_end" value="{{old('date_end')}}" name="date_end" class="form-control datetimepicker" type="text">
                        @if($errors->has('date_end'))
                            <span class="text-danger">{{$errors->first('date_end')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Độ ưu tiên:<span
                        class="text-danger">*</span></label>
                    <select name="priority" class="select">
                        <option {{old('priority')== 2?"selected":""}} value="2">Cao</option>
                        <option {{old('priority')== 1?"selected":""}} value="1">Trung bình</option>
                        <option  {{old('priority')== 0?"selected":""}} value="0">Thấp</option>
                    </select>
                    @if($errors->has('priority'))
                        <span class="text-danger">{{$errors->first('priority')}}</span>
                    @endif
                </div>
            </div>
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Tổng chi phí:<span
                        class="text-danger">*</span></label>
                    <input placeholder="" value="{{old('total_expense')}}" name="total_expense" class="form-control" min="0" type="number">
                    @if($errors->has('total_expense'))
                        <span class="text-danger">{{$errors->first('total_expense')}}</span>
                    @endif
                </div>
            </div> --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Trưởng dự án:<span
                        class="text-danger">*</span></label>
                    <select name="leader_id"  class="select">
                        @foreach($param['member'] as $i)
                            <option {{old('leader_id')== $i->id?"selected":""}} value="{{$i->id}}">{{$i->user_detail->fullname}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('leader_id'))
                        <span class="text-danger">{{$errors->first('leader_id')}}</span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Thành viên:<span
                        class="text-danger">*</span></label>
                    <select id="member"  name="member[]" class="select" multiple="multiple">
                        @foreach($param['member'] as $i)
                            <option {{in_array($i->id,old('member')??[])?"selected":""}} value="{{$i->id}}">{{$i->user_detail->fullname}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('member'))
                        <span class="text-danger">{{$errors->first('member')}}</span>
                    @endif
                </div>
            </div>  
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input name="project_image" accept="image/*" class="form-control" type="file">
                </div>
            </div>        
        </div>     
        <div class="row">
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Công nghệ sử dụng:<span
                        class="text-danger">*</span></label>
                    <select id="technology" name="technology[]" class="form-control" multiple="multiple">
                        @foreach(old('technology') ?? [] as $item ) 
                            <option selected>{{$item}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('technology'))
                        <span class="text-danger">{{$errors->first('technology')}}</span>
                    @endif
                </div>
            </div> --}}
            
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Link lưu trữ:<span
                        class="text-danger">*</span></label>
                    <input name="link_source" value="{{old('link_source')}}" class="form-control" type="text">
                    @if($errors->has('link_source'))
                        <span class="text-danger">{{$errors->first('link_source')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Link tài liệu:<span
                        class="text-danger">*</span></label>
                    <input name="link_document" value="{{old('link_document')}}" class="form-control" type="text">
                    @if($errors->has('link_document'))
                        <span class="text-danger">{{$errors->first('link_document')}}</span>
                    @endif
                </div>
            </div> --}}
            
        </div>
        
        <div class="form-group">
            <label>Chi tiết dự án:<span
                class="text-danger">*</span></label>
            <textarea rows="4" name="project_description" class="form-control summernote"
                      placeholder="Nhập chi tiết..">{{old('project_description')}}</textarea>
            @if($errors->has('project_description'))
                <span class="text-danger">{{$errors->first('project_description')}}</span>
            @endif
        </div>
        <div class="submit-section">
            <button class="btn btn-primary submit-btn">LƯU</button>
        </div>
    </form>

@endsection
@section('script')

<script>
    $('#member').select2();
    $('#technology').select2({
        'tags':true
    });
</script>

@endsection
