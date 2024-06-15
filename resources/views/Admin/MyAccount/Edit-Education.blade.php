@extends('Admin.Layouts.Master')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 ">
                    <h3 class="page-title">Thông tin tài khoản</h3>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">home</a></li>
                        <li class="breadcrumb-item active">thông tin</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Thông tin học vấn<a href="#" class="edit-icon"
                                                                   data-bs-toggle="modal" data-bs-target="#education_info"><i
                                    class="fa fa-pencil"></i></a></h3>
                        <div class="experience-box">
                            @if($admin->education->count()>0)
                                <ul class="experience-list">
                                    @foreach($admin->education as $i)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">{{$i->education_content}}</a>
                                                    {{--                                                    <div>Bsc Computer Science</div>--}}
                                                    <span class="time">{{App\Helper\DateHelper::month_year($i->date_start)}} - {{App\Helper\DateHelper::month_year($i->date_end)}}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            @else
                                <p>Không có dữ liệu</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
