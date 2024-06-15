@extends('Admin.Layouts.Master')
@section('title','Thêm khách hàng')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">THÊM KHÁCH HÀNG MỚI</h3>
                <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.khach-hang.danh-sach')}}">Trở lại</a></li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">


            </div>
        </div>
    </div>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Tên khách hàng<span
                    class="text-danger">*</span></label>
                <input name="customer_name" value="{{old('customer_name')}}" class="form-control" type="text">
                @if($errors->has('customer_name'))
                    <span class="text-danger">{{$errors->first('customer_name')}}</span>
                @endif
            </div>

        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Ngày sinh</label>
                <input name="birthday" value="{{old('birthday')}}" class="form-control datetimepicker" type="text">
                @if($errors->has('birthday'))
                    <span class="text-danger">{{$errors->first('birthday')}}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Giới tính</label>
               <select name="gender" class="select">
                   <option value="0">Không xác định</option>
                   <option value="1">Nam</option>
                   <option value="2">Nữ</option>
               </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{$errors->first('gender')}}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Số điện thoại<span
                    class="text-danger">*</span></label>
               <input name="phone" type="text" class="form-control" type="number">
                @if($errors->has('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Email<span
                    class="text-danger">*</span></label>
               <input name="email" type="email" class="form-control" >
                @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Địa chỉ</label>
               <input name="address" type="text" class="form-control">
                @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Ảnh đại diện</label>
               <input name="avatar" onchange="loadFile(event)" type="file" class="form-control">
                <div style="height: 100px;text-align: center;margin-top: 10px">
                <img id="output" style="max-height: 100%;" src="">
                </div>
                @if($errors->has('avatar'))
                    <span class="text-danger">{{$errors->first('avatar')}}</span>
                @endif
            </div>
        </div>
        <div class="submit-section">
            <button class="btn btn-primary submit-btn">Lưu</button>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
