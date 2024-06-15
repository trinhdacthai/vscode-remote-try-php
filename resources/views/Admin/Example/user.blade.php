@extends('Admin.Layouts.Master')
@section('title','Người dùng')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Users</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_user"><i
                        class="fa fa-plus"></i> Add User</a>
            </div>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">Name</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group custom-select">
                <select class="select floating">
                    <option>Select Company</option>
                    <option>Global Technologies</option>
                    <option>Delta Infotech</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group custom-select">
                <select class="select floating">
                    <option>Select Role</option>
                    <option>Web Developer</option>
                    <option>Web Designer</option>
                    <option>Android Developer</option>
                    <option>Ios Developer</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success w-100"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Created Date</th>
                        <th>Role</th>
                        <th class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img
                                        src="/assets/img/profiles/avatar-21.jpg" alt=""></a>
                                <a href="profile">Daniel Porter <span>Admin</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="c1a5a0afa8a4adb1aeb3b5a4b381a4b9a0acb1ada4efa2aeac">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-danger">Admin</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt=""
                                                                      src="/assets/img/profiles/avatar-02.jpg"></a>
                                <a href="profile">John Doe <span>Web Designer</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="bbd1d4d3d5dfd4defbdec3dad6cbd7de95d8d4d6">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-success">Employee</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt=""
                                                                      src="/assets/img/profiles/avatar-09.jpg"></a>
                                <a href="profile">Richard Miles <span>Admin</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="25574c464d445741484c49405665405d44485549400b464a48">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-success">Employee</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt=""
                                                                      src="/assets/img/profiles/avatar-10.jpg"></a>
                                <a href="profile">John Smith <span>Android Developer</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="19737671776a74706d71597c61787469757c377a7674">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-success">Employee</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt=""
                                                                      src="/assets/img/profiles/avatar-05.jpg"></a>
                                <a href="profile">Mike Litorus <span>IOS Developer</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="aac7c3c1cfc6c3dec5d8dfd9eacfd2cbc7dac6cf84c9c5c7">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-success">Employee</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt=""
                                                                      src="/assets/img/profiles/avatar-11.jpg"></a>
                                <a href="profile">Wilmer Deluna <span>Team Leader</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="a0d7c9cccdc5d2c4c5ccd5cec1e0c5d8c1cdd0ccc58ec3cfcd">[email&#160;protected]</a>
                        </td>
                        <td>Dreamguy's Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-success">Employee</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img
                                        src="/assets/img/profiles/avatar-19.jpg" alt=""></a>
                                <a href="profile">Barry Cuda <span>Global Technologies</span></a>
                            </h2>
                        </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                               data-cfemail="5c3e3d2e2e253f29383d1c39243d312c3039723f3331">[email&#160;protected]</a>
                        </td>
                        <td>Global Technologies</td>
                        <td>1 Jan 2013</td>
                        <td>
                            <span class="badge bg-inverse-info">Client</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#delete_user"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection
