@extends('Admin.Layouts.Master')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title text-center">CHỈNH SỬA THÔNG TIN</h3>
                    <ul class="breadcrumb">
                        <li class="btn btn-success w-10 fa fa-arrow-left"><a href="{{route('quan-tri.quan-ly-nhan-vien.danh-sach')}}" style="color:aliceblue"> Trở lại</a></li>
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
                                    <input name="fullname" value="{{old('fullname')??$admin->user_detail->fullname}}" class="form-control" type="text">
                                    @if($errors->has('fullname'))
                                        <span class="text-danger">{{$errors->first('fullname')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Ngày sinh<span
                                                class="text-danger">*</span></label>
                                    <div class="cal-icon"><input name="birthday" value="{{old('birthday')??App\Helper\DateHelper::date($admin->user_detail->birthday)}}" class="form-control datetimepicker"
                                                                 type="text"></div>
                                    @if($errors->has('birthday'))
                                        <span class="text-danger">{{$errors->first('birthday')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Số chứng minh thư
                                        <span
                                                class="text-danger">*</span></label>
                                    <input name="identity_number" value="{{old('identity_number')??$admin->user_detail->identity_number}}" class="form-control" >
                                    @if($errors->has('identity_number'))
                                        <span class="text-danger">{{$errors->first('identity_number')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Địa chỉ</label>
                                    <input name="address" value="{{old('address')??$admin->user_detail->address}}" class="form-control" type="text">
                                    @if($errors->has('address'))
                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input name="email" value="{{old('email')??$admin->email}}" class="form-control" type="email">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại<span class="text-danger">*</span></label>
                                    <input name="phone" value="{{old('phone')??$admin->phone}}" class="form-control" type="text">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Giới tính</label>
                                    <select name="gender"  class="select">
                                        <option {{old('gender')??$admin->user_detail->gender == 0?"selected":""}} value="0">Chọn - giới tính</option>
                                        <option {{old('gender')??$admin->user_detail->gender == 1?"selected":""}} value="1">Nam</option>
                                        <option {{old('gender')??$admin->user_detail->gender == 2?"selected":""}} value="2">Nữ</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <span class="text-danger">{{$errors->first('gender')}}</span>
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
                                                <option {{old('designation_id')??$admin->designation_id == $ii->id?"selected":""}}  value="{{$ii->id}}">{{$ii->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @if($errors->has('designation_id'))
                                        <span class="text-danger">{{$errors->first('designation_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Tài khoản<span class="text-danger">*</span></label>
                                    <input readonly name="" value="{{old('user_name')??$admin->user_name}}" class="form-control" type="text">
                                    @if($errors->has('user_name'))
                                        <span class="text-danger">{{$errors->first('user_name')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
