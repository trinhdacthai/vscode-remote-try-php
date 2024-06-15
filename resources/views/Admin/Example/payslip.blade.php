<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" id="debugbar_loader" data-time="1649931747" src="/index.php?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{public_path('system/public_paths/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/plugins/alertify/alertify.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/plugins/lightbox/glightbox.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/plugins/c3-chart/c3.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/plugins/toastr/toatr.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/fullcalendar.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/plugins/summernote/dist/summernote-bs4.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{public_path('system/public_paths/css/style.css')}}">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h4 class="payslip-title text-center">Lương tháng {{\Carbon\Carbon::parse($salary->created_at)->format('m')}} năm  {{\Carbon\Carbon::parse($salary->created_at)->format('Y')}}</h4>
            <div class="row">
                <div class="col-sm-6 m-b-20">
                    <img style="width: 50px" src="{{public_path($system->system_logo)}}" class="inv-logo" alt="">
                    <ul class="list-unstyled mb-0">
                        <li>{{$system->system_name}}</li>
                        <li>{{$system->system_address}},</li>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 m-b-20">
                    <h5>Thông tin nhân viên</h5>
                    <ul class="list-unstyled">
                        <li><h5 class="mb-0">Họ và tên:<strong>{{$us->user_detail->fullname}}</strong></h5></li>
                        <li><span>{{$us->designation->name??"---"}}</span></li>
                        <li>ID:{{$us->admin_code}}</li>
                        <li>Ngày tham gia: {{$us->created_at?\App\Helper\DateHelper::date($us->created_at):""}}</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <h4 class="m-b-10"><strong>Thông tin</strong></h4>
                        <table class="">
                            <tbody>
                            <tr>
                                <td><strong>Lương cơ bản</strong> <span class="float-end"></span></td><td>{{number_format($salary->basic_salary,0,'',',')}} VNĐ</td>
                            </tr>
                            <tr>
                                <td><strong>Số ngày nghỉ</strong> <span class="float-end"></span></td><td>{{$salary->total_off}}</td>
                            </tr>
                            <tr>
                                <td><strong>Số tiền thưởng</strong> <span class="float-end"></span></td><td>{{number_format($salary->bonus,0,'',',')}} VNĐ</td>
                            </tr>
                            <tr>
                                <td><strong>Tổng tiền</strong> <span class="float-end"><strong></strong></span></td><td>{{number_format($salary->total_salary,0,'',',')}} VNĐ</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
<style>
    body {
        font-family: DejaVu Sans, sans-serif;
    }
    ul li{
        list-style: none;
    }
    ul{
        padding-left: 0;
    }
    .payslip-title{
        text-align: center;
    }
    table{
        width: 100%;
    }
</style>





