@extends('Admin.Layouts.Master')
@section('content')
    <?php
    $item->date_start = \App\Helper\DateHelper::date_to_str($item->date_start);
    $item->date_end = \App\Helper\DateHelper::date_to_str($item->date_end);
    ?>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">CHỈNH SỬA DỰ ÁN</h3>
                <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.du-an.danh-sach')}}">Trở lại</a></li>
                </ul>
            </div>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Tên dự án:<span
                        class="text-danger">*</span></label>
                    <input name="project_name" value="{{$item->project_name??old('project_name')}}" class="form-control" type="text">
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
                            <option {{($item->customer_id??old('customer_id'))==$i->id?"selected":""}} value="{{$i->id}}">{{$i->customer_name}}</option>
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
                        <input id="date_start" value="{{$item->date_start??old('date_start')}}" name="date_start"
                               class="form-control date_start datetimepicker" type="text">
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
                        <input id="date_end" value="{{$item->date_end??old('date_end')}}" name="date_end"
                               class="form-control datetimepicker" type="text">
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
                        <option {{($item->priority??old('priority'))== 2?"selected":""}} value="2">Cao</option>
                        <option {{($item->priority??old('priority'))== 1?"selected":""}} value="1">Trung bình</option>
                        <option {{($item->priority??old('priority'))== 0?"selected":""}} value="0">Thấp</option>
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
                    <input placeholder="" value="{{$item->total_expense??old('total_expense')}}" name="total_expense" class="form-control"
                           type="number">
                    @if($errors->has('total_expense'))
                        <span class="text-danger">{{$errors->first('total_expense')}}</span>
                    @endif
                </div>
            </div> --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Trưởng dự án:<span
                        class="text-danger">*</span></label>
                    <select name="leader_id" class="select">
                        @foreach($param['member'] as $i)
                            <option {{$item->leader_id??old('leader_id')== $i->id?"selected":""}} value="{{$i->id}}">{{$i->user_detail->fullname}}</option>
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
                    <select id="member" name="member[]" class="select" multiple="multiple">
                        @foreach($param['member'] as $i)
                            <option {{in_array($i->id,$item->implementer_arr_id()??old('member'))?"selected":""}} value="{{$i->id}}">{{$i->user_detail->fullname}}</option>
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

        
        {{-- <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Công nghệ sử dụng:<span
                        class="text-danger">*</span></label>
                    <select id="technology" name="technology[]" class="form-control" multiple="multiple">
                        @foreach(json_decode($item->technology) as $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('technology'))
                        <span class="text-danger">{{$errors->first('technology')}}</span>
                    @endif
                </div>
            </div>
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Nhóm dự án</label>
                    <select name="categories_id" class="select">
                        @foreach( $param['categories'] as $i)
                            <option {{($item->categories_id ?? old('categories_id')) == $i->id?"selected":""}} value="{{$i->id}}">{{$i->categories_name}}</option>
                        @endforeach
                        <option {{($item->categories_id ?? old('categories_id')) == '0' ? "selected":""}} value="0">Khác</option>
                    </select>
                    @if($errors->has('categories_id'))
                        <span class="text-danger">{{$errors->first('categories_id')}}</span>
                    @endif
                </div>
            </div> --}}
            {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Link lưu trữ:<span
                        class="text-danger">*</span></label>
                    <input name="link_source" value="{{$item->link_source??old('link_source')}}" class="form-control" type="text">
                    @if($errors->has('link_source'))
                        <span class="text-danger">{{$errors->first('link_source')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Link tài liệu:<span
                        class="text-danger">*</span></label>
                    <input name="link_document" value="{{$item->link_document??old('link_document')}}" class="form-control" type="text">
                    @if($errors->has('link_document'))
                        <span class="text-danger">{{$errors->first('link_document')}}</span>
                    @endif
                </div>
            </div>
            
        </div> --}} 
        
        <div class="form-group">
            <label>Chi tiết dự án:<span
                class="text-danger">*</span></label>
            <textarea rows="4" name="project_description" class="form-control summernote"
                      placeholder="Nhập chi tiết..">{{$item->project_description??old('project_description')}}</textarea>
            @if($errors->has('project_description'))
                <span class="text-danger">{{$errors->first('project_description')}}</span>
            @endif
        </div>
        <div class="submit-section">
            <button class="btn btn-primary submit-btn">CẬP NHẬT</button>
        </div>
        
    </form>
@endsection
@section('script')

    <script>
        $('#member').select2();
        $('#technology').select2({
            'tags': true
        });
    </script>

@endsection
