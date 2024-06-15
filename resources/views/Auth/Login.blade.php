@extends('Auth.Master')
@section('content')
    <div class="main-wrapper ">
        <div class="account-content ">
            <div class="container ">

                <div class="account-logo">
                    <a><img src="{{asset('system/assets/img/logo2.jpg')}}" alt="Dreamguy's Technologies"></a>
                </div>

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">ĐĂNG NHẬP</h3>
{{--                        <p class="account-subtitle">Access to our dashboard</p>--}}

                        <form class="custom-form mt-4 pt-2"  action="{{route('dang-nhap')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user_name" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nhập tên tài khoản"
                                        value="{{old('user_name')}}">
                                @if($errors->has('user_name'))
                                    <div class="text-danger">
                                        {{$errors->first('user_name')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="">
                                            Quên mật khẩu
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="Nhập mật khẩu" value="">
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                    @if(Session::has('fail'))
                                        <div class="text-danger">
                                            {{Session::get('fail')}}
                                        </div>
                                    @endif
                                    <span class="fa fa-eye-slash" id="toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">ĐĂNG NHẬP</button>
                            </div>
                            <div class="account-footer">
                                <p>Bạn chưa có tài khoản ? <a href="" style="color: brown">Đăng kí</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
