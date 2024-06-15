@extends('Admin.Layouts.Master')
@section('title','Thông tin')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title text-center">THÔNG TIN CÁ NHÂN</h3>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">home</a></li>
                        <li class="breadcrumb-item active">thông tin</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        {{-- <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab"
                                                class="nav-link active">Thông tin</a></li>
                        {{-- <li class="nav-item"><a href="#emp_projects" data-bs-toggle="tab"
                                                class="nav-link">Dự án</a></li> --}}
                        {{-- <li class="nav-item"><a href="#bank_statutory" data-bs-toggle="tab"
                                                class="nav-link">Thông tin khác</a></li> --}}
                    {{-- </ul>
                </div>
            </div>
        </div> --}} 
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a target="_blank" href="{{asset($admin->avatar??'uploads/avatar/avatar_defaul1.png')}}"><img alt="" style="object-position: center;width: 100%" src="{{asset($admin->avatar??'uploads/avatar/avatar_defaul1.png')}}"></a>

                                </div>

                            </div>

                            <div class="profile-basic">

                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Mã nhân viên:</div>
                                                <div class="text">{{$admin->user_code}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Họ tên:</div>
                                                <div class="text">{{$admin->user_detail->fullname??"Không có"}}</div>
                                            </li>
                                           
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text">{{$admin->email??"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Phòng ban:</div>
                                                <div class="text">{{$admin->designation->department->name??"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Vị trí:</div>
                                                <div class="text">{{$admin->designation->name??"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Số điện thoại:</div>
                                                <div class="text">{{$admin->phone??"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Ngày sinh:</div>
                                                <div class="text">{{$admin->user_detail->birthday!=null?App\Helper\DateHelper::date($admin->user_detail->birthday):"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Địa chỉ:</div>
                                                <div class="text">{{$admin->user_detail->address??"Không có"}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Giới tính:</div>
                                                <div class="text">
                                                    @if($admin->user_detail->gender == 1)
                                                        {{"Nam"}}
                                                    @elseif($admin->user_detail->gender == 2)
                                                        {{"Nữ"}}
                                                    @else
                                                        {{"Không xác định"}}

                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Số chứng minh nhân dân:</div>
                                                <div class="text">
                                                    {{$admin->user_detail->identity_number??"Không có"}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Ngày tham gia:</div>
                                                <div class="text">{{App\Helper\DateHelper::date($admin->created_at)}}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit btn btn-primary"><a data-bs-target="#profile_info" data-bs-toggle="modal"
                                                      href="#" style="color: white"><i class="fa fa-pencil" style="color: white"></i> Chỉnh sửa</a>

                            </div>
                            <div style="top: 40px" class="pro-edit btn btn-success">
                            <a data-bs-target="#profile_change_password" data-bs-toggle="modal"
                               href="#" style="color: white"><i class="fa fa-pencil" style="color: white"></i> Đổi mật khẩu</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-content">
            <div id="emp_profile" class="pro-overview tab-pane fade show active">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Học vấn<a href="#" class="float-end btn btn-success" class="edit-icon"
                                                                                 data-bs-toggle="modal" data-bs-target="#add_education"><i
                                            class="fa fa-plus"></i>Thêm</a></h3>
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
                                                <div class="float-end" style="display: flex;margin-top: -5%">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#update_education{{$i->id}}"  class="float-end btn btn-primary" class="edit-icon" style="margin-top: -7%"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:{}" onclick="delete_item('{{$i->id}}','{{route('tai-khoan.xoa-hoc-van','')}}')" class="float-end btn btn-danger" class="edit-icon" data-id ="{{$i->id}}" style="margin-top: -7%;margin-left: -1%"><i class="fa fa-remove"></i></a>
                                                </div>
                                            </div>
                                            <div id="update_education{{$i->id}}" class="modal custom-modal fade" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">CHỈNH SỬA THÔNG TIN HỌC VẤN</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('tai-khoan.cap-nhat-hoc-van',$i->id)}}" method="post">
                                                                @csrf
                                                                <div class="form">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <h3 class="card-title">Tên trường:</h3>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group form-focus">
                                                                                        <input name="education_content" type="text" class="form-control floating"
                                                                                               value="{{old('education_content')??$i->education_content}}" placeholder="ĐH Công Nghệ Sài Gòn">

                                                                                    </div>
                                                                                    @if($errors->has('education_content'))
                                                                                        <span class="text-danger">{{$errors->first('education_content')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                                <h3 class="card-title">Thời gian bắt đầu:</h3>

                                                                                <div class="col-md-12">
                                                                                    <div class="form-group form-focus">
                                                                                        <div class="cal-icon">
                                                                                            <input type="text"
                                                                                                   class="form-control floating datetimepicker"
                                                                                                   value="{{old('date_start')??\App\Helper\DateHelper::date($i->date_start)}}" name="date_start" placeholder="23/09/2019">
                                                                                        </div>
                                                                                    </div>
                                                                                    @if($errors->has('date_start'))
                                                                                        <span class="text-danger">{{$errors->first('date_start')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                                <h3 class="card-title">Thời gian kết thúc:</h3>

                                                                                <div class="col-md-12">
                                                                                    <div class="form-group form-focus">
                                                                                        <div class="cal-icon">
                                                                                            <input type="text" name="date_end"
                                                                                                   class="form-control floating datetimepicker"
                                                                                                   value="{{old('date_end')??\App\Helper\DateHelper::date($i->date_end)}}">
                                                                                        </div>
                                                                                        <label class="focus-label">Thời gian kết thúc</label>
                                                                                    </div>
                                                                                    @if($errors->has('date_end'))
                                                                                        <span class="text-danger">{{str_replace('now', 'Ngày hiện tại',$errors->first('date_end'))}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="submit-section">
                                                                    <button class="btn btn-primary button_update_ex submit-btn">CẬP NHẬT</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
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
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Kinh nghiệm<a href="#" class="float-end btn btn-success"
                                                                               data-bs-toggle="modal" data-bs-target="#experience_info"><i
                                            class="fa fa-plus"></i> Thêm</a></h3>
                                <div class="experience-box">
                                    @if($admin->experience->count()>0)
                                        <ul class="experience-list">
                                            @foreach($admin->experience as $i)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">{{$i->designation}} tại {{$i->workplace}}</a>
                                                            <span class="time">{{App\Helper\DateHelper::month_year($i->date_start)}} - {{App\Helper\DateHelper::month_year($i->date_end)}}</span>
                                                        </div>
                                                        <div class="float-end" style="display: flex;margin-top: -5%">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#update_experience{{$i->id}}" class="float-end btn btn-primary" class="edit-icon" style="margin-top: -7%"><i class="fa fa-pencil"></i></a>
                                                            <a href="javascript:{}" onclick="delete_item('{{$i->id}}','{{route('tai-khoan.xoa-kinh-nghiem','')}}')" class="float-end btn btn-danger" class="edit-icon" data-id ="{{$i->id}}" style="margin-top: -7%;margin-left: -1%"><i class="fa fa-remove"></i></a>
                                                        </div>
                                                       </div>
                                                </li>
                                                <div id="update_experience{{$i->id}}" class="modal custom-modal fade" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">CHỈNH SỬA KINH NGHIỆM LÀM VIỆC</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('tai-khoan.cap-nhat-kinh-nghiem',$i->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <h3 class="card-title">Tên công ty:</h3>

                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group form-focus">
                                                                                            <input name="workplace" type="text" class="form-control floating"
                                                                                                   value="{{old('workplace')??$i->workplace}}" placeholder="Digital Devlopment Inc">

                                                                                        </div>
                                                                                        @if($errors->has('workplace'))
                                                                                            <span class="text-danger">{{$errors->first('workplace')}}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                    <h3 class="card-title">Vị trí:</h3>

                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group form-focus">
                                                                                            <input type="text" class="form-control floating"
                                                                                                   value="{{old('designation')??$i->designation}}" name="designation" placeholder="Php dev ...">
                                                                                        </div>
                                                                                        @if($errors->has('designation'))
                                                                                            <span class="text-danger">{{$errors->first('designation')}}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                    <h3 class="card-title">Thời gian bắt đầu:</h3>

                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group form-focus">
                                                                                            <div class="cal-icon">
                                                                                                <input type="text"
                                                                                                       class="form-control floating datetimepicker"
                                                                                                       value="{{old('date_start')??\App\Helper\DateHelper::date($i->date_start)}}" name="date_start" placeholder="01/07/2007">
                                                                                            </div>
                                                                                        </div>
                                                                                        @if($errors->has('date_start'))
                                                                                            <span class="text-danger">{{$errors->first('date_start')}}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                    <h3 class="card-title">Thời gian kết thúc:</h3>

                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group form-focus">
                                                                                            <div class="cal-icon">
                                                                                                <input type="text" name="date_end"
                                                                                                       class="form-control floating datetimepicker"
                                                                                                       value="{{old('date_end')??\App\Helper\DateHelper::datetime($i->date_end)}}">
                                                                                            </div>
                                                                                        </div>
                                                                                        @if($errors->has('date_end'))
                                                                                            <span class="text-danger">{{str_replace('now', 'Ngày hiện tại',$errors->first('date_end'))}}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="submit-section">
                                                                        <button class="btn btn-primary button_update_ex submit-btn">CẬP NHẬT</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Không có dữ liệu</p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                        <div class="pro-overview tab-pane fade show active" id="emp_profile">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                            <h3 style="text-align: center">Lương-Thưởng</h3>
                            <table class="table">
                                <thead style="background-color: bisque">
                                    <th>ID</th>
                                    <th>Thời gian nhận</th>
                                    <th>Tháng</th>
                                    <th>Số ngày nghỉ</th>
                                    <th>Lương cơ bản</th>
                                    <th>Thực nhận</th>
                                    <th>Tiền thưởng</th>
                                    <th>Tổng tiền</th>
                                </thead>
                                <tbody>
                                @forelse($salary as $i)
                                    <tr>
                                        <td>{{$i->id}}</td>
                                        <td>{{\App\Helper\DateHelper::datetime($i->created_at)}}</td>
                                        <td>{{\Carbon\Carbon::create($i->created_at)->format('m')}}</td>
                                        <td>{{$i->total_off??"---"}}</td>
                                        <td>{{number_format($i->basic_salary,0,'','.')}} VNĐ</td>
                                        <td>{{number_format($i->basic_salary-(($i->basic_salary/22)*$i->totaloff),0,'','.')}} VNĐ</td>
                                        <td>{{number_format($i->bonus,0,'','.')}} VNĐ</td>
                                        <td>{{number_format($i->total_salary,0,'','.')}} VNĐ</td>
            
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Không có dữ liệu</td>
            
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="row"> --}}

                </div>


            <div class="tab-pane fade" id="emp_projects">
                <x-home.list-project-me></x-home.list-project-me>

            </div>
        </div>
    </div>
    <div id="profile_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update-info" action="{{route('tai-khoan.cap-nhat')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap edit-img">
                                    <img class="inline-block" src="{{asset($admin->avatar??'uploads/avatar/avatar_defaul1.png')}}"
                                         alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">Thay đổi</span>
                                        <input accept="image/*" name="avatar" class="upload" type="file">
                                        @if($errors->has('avatar'))
                                            <span class="text-danger">{{$errors->first('avatar')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Họ và tên:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="fullname" type="text" class="form-control" value="{{old('fullname')??$admin->user_detail->fullname}}">
                                            @if($errors->has('fullname'))
                                            <span class="text-danger">{{$errors->first('fullname')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="phone" value="{{old('phone')??$admin->phone}}">
                                            @if($errors->has('phone'))
                                                <span class="text-danger">{{$errors->first('phone')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{old('email')??$admin->email}}">
                                            @if($errors->has('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số chứng minh nhân dân:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="identity_number" value="{{old('identity_number')??$admin->user_detail->identity_number}}">
                                            @if($errors->has('identity_number'))
                                                <span class="text-danger">{{$errors->first('identity_number')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <div class="cal-icon">
                                                <input name="birthday" class="form-control datetimepicker" type="text"
                                                       value="{{old('birthday')??App\Helper\DateHelper::date($admin->user_detail->birthday)}}">
                                                @if($errors->has('birthday'))
                                                    <span class="text-danger">{{$errors->first('birthday')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select name="gender" class="select form-control">
                                                <option {{old('gender')??$admin->user_detail->gender == 0?"selected":""}} value="0">Không xác định</option>
                                                <option {{old('gender')??$admin->user_detail->gender == 1?"selected":""}} value="1">Nam</option>
                                                <option {{old('gender')??$admin->user_detail->gender == 2?"selected":""}} value="2">Nữ</option>
                                            </select>
                                            @if($errors->has('gender'))
                                                <span class="text-danger">{{$errors->first('gender')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')??$admin->user_detail->address}}">
                                    @if($errors->has('address'))
                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tên ngân hàng</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{old('bank_name')??$admin->bank->bank_name}}">
                                    @if($errors->has('bank_name'))
                                        <span class="text-danger">{{$errors->first('bank_name')}}</span>
                                    @endif
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Số tài khoản</label>
                                    <input type="text" class="form-control" name="bank_number" value="{{old('bank_number')??$admin->bank->bank_number}}">
                                    @if($errors->has('bank_number'))
                                        <span class="text-danger">{{$errors->first('bank_number')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chủ tài khoản</label>
                                    <input type="text" class="form-control" name="bank_author" value="{{old('bank_author')??$admin->bank->bank_author}}">
                                    @if($errors->has('bank_author'))
                                        <span class="text-danger">{{$errors->first('bank_author')}}</span>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phòng ban<span class="text-danger">*</span></label>
                                    <select id="department_id" name="department_id" onchange="get_designation(this,'{{route('param.designation','')}}','#designation_id')" class="select">
                                        @foreach($param['department'] as $i)
                                        <option {{(old('department_id')??$admin->designation->department->id ??-1) == $i->id?"selected":""}} value="{{$i->id}}">{{$i->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('department_id'))
                                        <span class="text-danger">{{$errors->first('department_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vị trí <span class="text-danger">*</span></label>
                                    <select name="designation_id" id="designation_id" class="select">
                                    </select>
                                    @if($errors->has('designation_id'))
                                        <span class="text-danger">{{$errors->first('designation_id')}}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button type="button" id="button-update-info" class="btn btn-primary submit-btn">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="profile_change_password" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ĐỔI MẬT KHẨU</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update-info" action="{{route('tai-khoan.doi-mat-khau')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mật khẩu cũ:<span class="text-danger">*</span></label>
                                            <input name="password_old" type="password" class="form-control" value="">
                                            @if($errors->has('password_old'))
                                                <span class="text-danger">{{$errors->first('password_old')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mật khẩu mới:<span class="text-danger">*</span></label>
                                            <input name="password_new" type="password" class="form-control" value="">
                                            @if($errors->has('password_new'))
                                                <span class="text-danger">{{$errors->first('password_new')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu:<span class="text-danger">*</span></label>
                                            <input name="password_again" type="password" class="form-control" value="">
                                            @if($errors->has('password_again'))
                                                <span class="text-danger">{{$errors->first('password_again')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="button" id="button-update-password" class="btn btn-primary submit-btn">ĐỔI MẬT KHẨU</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÊM KINH NGHIỆM LÀM VIỆC</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tai-khoan.them-kinh-nghiem')}}" method="post">
                        @csrf
                        <div class="form">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h3 class="card-title">Tên công ty:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <input name="workplace" type="text" class="form-control floating"
                                                       value="{{old('workplace')}}" placeholder="Digital Devlopment Inc">

                                            </div>
                                            @if($errors->has('workplace'))
                                                <span class="text-danger">{{$errors->first('workplace')}}</span>
                                            @endif
                                        </div>
                                        <h3 class="card-title">Vị trí:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating"
                                                       value="{{old('designation')}}" name="designation" placeholder="Php dev ...">
                                            </div>
                                            @if($errors->has('designation'))
                                                <span class="text-danger">{{$errors->first('designation')}}</span>
                                            @endif
                                        </div>
                                        <h3 class="card-title">Thời gian bắt đầu:</h3>
                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text"
                                                           class="form-control floating datetimepicker"
                                                           value="{{old('date_start')}}" name="date_start" placeholder="01/07/2007">
                                                </div>
                                            </div>
                                            @if($errors->has('date_start'))
                                                <span class="text-danger">{{$errors->first('date_start')}}</span>
                                            @endif
                                        </div>
                                        <h3 class="card-title">Thời gian kết thúc:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" name="date_end"
                                                           class="form-control floating datetimepicker"
                                                           value="{{old('date_end')}}">
                                                </div>
                                            </div>
                                            @if($errors->has('date_end'))
                                                <span class="text-danger">{{str_replace('now', 'Ngày hiện tại',$errors->first('date_end'))}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">LƯU</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="add_education" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÊM THÔNG TIN HỌC VẤN</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tai-khoan.them-hoc-van')}}" method="post">
                        @csrf
                        <div class="form">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h3 class="card-title">Tên trường:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <input name="education_content" type="text" class="form-control floating"
                                                       value="{{old('education_content')}}" placeholder="Đại học Công Nghệ Sài Gòn">

                                            </div>
                                            @if($errors->has('education_content'))
                                                <span class="text-danger">{{$errors->first('education_content')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="card-title">Thời gian bắt đầu:</h3>

                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text"
                                                           class="form-control floating datetimepicker"
                                                           value="{{old('date_start')}}" name="date_start" placeholder="01/07/2007">
                                                </div>
                                            </div>
                                            @if($errors->has('date_start'))
                                                <span class="text-danger">{{$errors->first('date_start')}}</span>
                                            @endif
                                        </div>
                                        <h3 class="card-title">Thời gian kết thúc:</h3>

                                        <div class="col-md-12">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" name="date_end"
                                                           class="form-control floating datetimepicker"
                                                           value="{{old('date_end')}}">
                                                </div>
                                            </div>
                                            @if($errors->has('date_end'))
                                                <span class="text-danger">{{str_replace('now', 'Ngày hiện tại',$errors->first('date_end'))}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">LƯU</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--{{dd(request()->session()->all())}}--}}
@endsection
@section('script')
    <script src="{{asset('system/js/main.js')}}"></script>
    <script>
        $(document).ready(function (){

            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('update_info'))
            $('#profile_info').modal('show')
            @endif
            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('update_password'))
            $('#profile_change_password').modal('show')
            @endif

            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('add_ex'))
            $('#experience_info').modal('show')
            @endif
            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('add_edu'))
            $('#add_education').modal('show')
            @endif
            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('update_ex'))
            var id = '#update_experience'+'{{\Illuminate\Support\Facades\Session::get('update_ex')}}';
            $(id).modal('show')
            @endif
            @if($errors->count()>0 && \Illuminate\Support\Facades\Session::has('update_edu'))
            var id = '#update_education'+'{{\Illuminate\Support\Facades\Session::get('update_edu')}}';
            $(id).modal('show')
            @endif
            get_designation('#department_id','{{route('param.designation','')}}','#designation_id','{{$admin->designation_id}}');
        });
        $('#button-update-info').click(function (){
            $(this.form.submit());
        });
        $('#button-update-password').click(function (){
            $(this.form.submit());
        });
        $('#button_update_ex').click(function(){
           $(this.form.submit());
        });
    </script>
@endsection
