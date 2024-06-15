<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" id="debugbar_loader" data-time="1649931747" src="/index.php?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Codeigniter Admin Template">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Codeigniter Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('system/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/plugins/alertify/alertify.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/plugins/lightbox/glightbox.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/plugins/c3-chart/c3.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/plugins/toastr/toatr.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/fullcalendar.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/plugins/summernote/dist/summernote-bs4.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('system/assets/css/style.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @section('style') @show
</head>

<body>
@php
    $user = \App\Models\User::find(\Illuminate\Support\Facades\Auth::guard('admin')->id());
    $system = \Illuminate\Support\Facades\DB::table('system_config')->first();
@endphp
<div class="main-wrapper" >
    <div class="header">

        <div class="header-left" >
            <a href="dashboard" class="logo">
                <img src="{{asset($system->system_logo)}}" width="40" height="40" alt="">
            </a>
        </div>
        

        <div class="page-title-box">
            {{-- <h3>{{$system->system_name}}</h3> --}}
            <h3 class="page-title text-center">Xin chào {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->user_name}}!!!</h3>

        </div>


        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <i class="fa fa-comment-o"></i> <span class="badge rounded-pill number_noti">1</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Tin nhắn</span>
                        <a href="javascript:void(1)" class="clear-noti">Xóa</a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="apps-chat">
                                    <div class="list-item">
                                        <div class="list-left">
                                                <span class="avatar">
                                                  <img alt="" src="/assets/img/profiles/avatar-09.jpg">
                                                </span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                        </div>
                                   </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{asset($user->avatar??"uploads/avatar/avatar_defaul1.png")}}" alt="">
                            <span class="status online"></span></span>
                    <span>{{$user->user_detail->fullname}}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('tai-khoan.thong-tin')}}">Thông tin</a>
{{--                    <a class="dropdown-item" href="settings">Settings</a>--}}
                    <a class="dropdown-item" href="{{route('dang-xuat')}}">Đăng xuất</a>
                </div>
            </li>
        </ul>

    </div>
    @include('Admin.Layouts.Sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">
        @section('content') @show
        </div>

    </div>

</div>

<script>

</script>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('system/assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('system/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('system/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('system/assets/js/select2.min.js')}}"></script>

<script src="{{asset('system/assets/js/moment.min.js')}}"></script>
<script src="{{asset('system/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('system/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

<script src="{{asset('system/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('system/assets/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('system/assets/js/jquery.fullcalendar.js')}}"></script>

<script src="{{asset('system/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('system/assets/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('system/assets/js/validation.init.js')}}"></script>

<script src="{{asset('system/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('system/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('system/assets/js/chart.js')}}"></script>

<script src="{{asset('system/assets/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js" integrity="sha512-/xb5+PNOA079FJkngKI2jvID5lyiqdHXaUUcfmzE0X0BdpkgzIWHC59LOG90a2jDcOyRsd1luOr24UCCAG8NNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('system/js/param.js')}}"></script>

{!! \Brian2694\Toastr\Facades\Toastr::message() !!}
<script>
    @if(count($errors) > 0)
    toastr.error("Đã xảy ra lỗi");
    @endif
</script>
<script>
    var socket = io('http://localhost:6001');
    socket.on('chat-client', (msg) => {
        var admin = msg['admin'];
        var message = msg['message'];

        if(admin['id'] != '{{\Illuminate\Support\Facades\Auth::guard('admin')->id()}}'){
            var text = '<li class="notification-message">'+
                '<a href="apps-chat">'+
                    '<div class="list-item">'+
                        '<div class="list-left">'+
                                 '<span class="avatar">';
                if(admin['avatar']!=null){
                    text+='<img alt="" src="'+admin['avatar']+'">';
                }
                else{
                    text+='<img alt="" src="uploads/avatar/avatar_defaul1.png">';
                }
                text+= '</span>'
                        +'</div>'
                      + ' <div class="list-body">'
                           + '<span class="message-author">'+msg['admin_detail']['fullname']+'</span>'
                           + '<span class="message-time">'+msg['date']+'</span>'
                          +  '<div class="clearfix"></div>'
                        +    '<span class="message-content">'+message['content']+'</span>'
                        +'</div>'
                    +'</div>'
               + '</a>'+
            '</li>';
                $('.notification-list').append(text);
            $('.number_noti').html((parseInt($('.number_noti').html())+1));
        }
    });
    $('.clear-noti').click(function (){
        $('.notification-list').empty();
        $('.number_noti').html('0');
    });
</script>
@section('script') @show
</body>

</html>
