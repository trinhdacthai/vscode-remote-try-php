@extends('Admin.Layouts.Master')
@section('title','Setting')
@section('content')
    {{--    href="{{route('system.config')}}"--}}
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h3 class="page-title">THÔNG TIN CÔNG TY</h3>
                        </div>
                    </div>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            {{--                            @if($errors->any())--}}
                            {{--                                                            @if($errors->has('system_name'))--}}

                            <div class="form-group">
                                <label>Tên công ty <span class="text-danger">*</span></label>

                                <input class="form-control" name="system_name" type="text"
                                       value="{{$param->system_name}}">
                                <div class="text-danger">
                                    {{$errors->first('system_name')}}
                                </div>
                                {{--                                @endif--}}
                            </div>
                            {{--                                @endif--}}
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Số điện thoại liên hệ<span class="text-danger">*</span></label>
                                <input class="form-control " name="system_phone" value="{{old('system_phone')?? $param->system_phone}}"
                                       type="text">
                                <div class="text-danger">
                                    {{$errors->first('system_phone')}}
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Số điện thoại kỹ thuật<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_phone_technology"
                                       value="{{old('system_phone_technology')?? $param->system_phone_technology}}" type="text">
                                <div class="text-danger">
                                    {{$errors->first('system_phone_technology')}}

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Link Contact online<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_facebook" value="{{$param->system_facebook}}"
                                       type="text">
                                <div class="text-danger">
                                    {{$errors->first('system_facebook')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Thông tin công ty<span class="text-danger">*</span></label>
                                <input class="form-control " name="system_info"
                                       value="{{$param->system_info}}" type="text">
                                <div class="text-danger">
                                    {{$errors->first('system_info')}}
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Địa chỉ công ty<span class="text-danger">*</span></label>
                                <input class="form-control " name="system_address"
                                       value="{{$param->system_address}}" type="text">
                                <div class="text-danger">
                                    {{$errors->first('system_address')}}

                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label>Logo hệ thống <span class="text-danger">*</span></label>
                        <input name="system_logo" type="file" accept="image/*" onchange="loadFile(event)">
                        <img src="{{asset($param->system_logo)}}"  style="width: 300px;" id="output"/>
                        <div class="text-danger">
                            {{$errors->first('system_logo')}}
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">CẬP NHẬT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@section('style')
    <style>

    </style>
@endsection
