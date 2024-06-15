@extends('Admin.Layouts.Master')
@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title text-center">THÊM NHÂN VIÊN MỚI</h3>
                <ul class="breadcrumb">
                    <li class="btn btn-success w-10"><a href="{{route('quan-tri.quan-ly-nhan-vien.danh-sach')}}">Trở lại</a></li>
                </ul>
            </div>
            <div class="mt-5">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Họ và tên<span
                                        class="text-danger">*</span></label>
                                <input name="fullname" value="{{old('fullname')}}" class="form-control" type="text">
                                @if($errors->has('fullname'))
                                    <span class="text-danger">{{$errors->first('fullname')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Ngày sinh<span
                                            class="text-danger">*</span></label>
                                <div class="cal-icon"><input name="birthday" value="{{old('birthday')}}" class="form-control datetimepicker"
                                                             type="text"></div>
                                @if($errors->has('birthday'))
                                    <span class="text-danger">{{$errors->first('birthday')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Số chứng minh nhân dân
                                    <span
                                            class="text-danger">*</span></label>
                                <input name="identity_number" value="{{old('identity_number')}}" class="form-control" type="text">
                                @if($errors->has('identity_number'))
                                    <span class="text-danger">{{$errors->first('identity_number')}}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Email<span
                                        class="text-danger">*</span></label>
                                <input name="email" value="{{old('email')}}" class="form-control" type="email">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Số điện thoại<span class="text-danger">*</span></label>
                                <input name="phone" value="{{old('phone')}}" class="form-control" type="text">
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Giới tính</label>
                                <select name="gender"  class="select">
                                    <option value="0">Chọn - giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
{{--                                    <option>Marketing</option>--}}
                                </select>
                                @if($errors->has('gender'))
                                    <span class="text-danger">{{$errors->first('gender')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-form-label">Địa chỉ</label>
                                <input name="address" value="{{old('address')}}" class="form-control" type="address">
                                @if($errors->has('address'))
                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Vị trí<span
                                        class="text-danger">*</span></label>
                                <select name="designation_id" class="select">

                                    @foreach($param['department']  as $i)
                                    <optgroup label="{{$i->name}}"></optgroup>
                                        @foreach($i->designation as $ii)
                                         <option value="{{$ii->id}}">{{$ii->name}}</option>
                                        @endforeach
                                    @endforeach
{{--                                    <option value="0">Chọn - giới tính</option>--}}
{{--                                    <option value="1">Nam</option>--}}
{{--                                    <option value="2">Nữ</option>--}}
                                </select>
                                @if($errors->has('designation_id'))
                                    <span class="text-danger">{{$errors->first('designation_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Tài khoản<span class="text-danger">*</span></label>
                                <input name="user_name" value="{{old('user_name')}}" class="form-control" type="text">
                                @if($errors->has('user_name'))
                                    <span class="text-danger">{{$errors->first('user_name')}}</span>
                                @endif
                            </div>
                        </div> <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                                <input name="password" class="form-control" type="password">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div> <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                                <input name="repeat-password" class="form-control" type="password">
                                @if($errors->has('repeat-password'))
                                    <span class="text-danger">{{$errors->first('repeat-password')}}</span>
                                @endif
                            </div>
                        </div>



                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
