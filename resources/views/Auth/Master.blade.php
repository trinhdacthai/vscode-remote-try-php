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

<body class="account-page">
        @section('content')@show
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
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{!! \Brian2694\Toastr\Facades\Toastr::message() !!}
<script>
    @if(count($errors) > 0)
    toastr.error("Đã xảy ra lỗi");
    @endif
</script>
@section('script') @show
</body>

</html>
