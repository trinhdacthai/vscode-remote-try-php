@extends('Admin.Layouts.Master')
@section('title','Setting')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Lead Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Project</th>
                            <th>Assigned Staff</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-11.jpg"></a>
                                    <a href="#">Wilmer Deluna</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="b2c5dbdedfd7c0d6d7dec7dcd3f2d7cad3dfc2ded79cd1dddf">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Hospital Administration</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle"
                                           data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-02.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-09.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-10.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-05.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-11.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-12.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-13.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-01.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="/assets/img/profiles/avatar-16.jpg">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link"
                                                                             href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link"
                                                                             href="#">2</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>10 hours ago</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-01.jpg"></a>
                                    <a href="#">Lesley Grauer</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="026e67716e677b65706377677042677a636f726e672c616d6f">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Video Calling App</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>5 Mar 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-16.jpg"></a>
                                    <a href="#">Jeffery Lalor</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="e9838c8f8f8c9b90858885869ba98c91888499858cc78a8684">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Office Management</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>27 Feb 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-11.jpg"></a>
                                    <a href="#">Wilmer Deluna</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="90e7f9fcfdf5e2f4f5fce5fef1d0f5e8f1fde0fcf5bef3fffd">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Hospital Administration</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>10 hours ago</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-01.jpg"></a>
                                    <a href="#">Lesley Grauer</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="a9c5ccdac5ccd0cedbc8dcccdbe9ccd1c8c4d9c5cc87cac6c4">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Video Calling App</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>5 Mar 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-16.jpg"></a>
                                    <a href="#">Jeffery Lalor</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="86ece3e0e0e3f4ffeae7eae9f4c6e3fee7ebf6eae3a8e5e9eb">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Office Management</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>27 Feb 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-11.jpg"></a>
                                    <a href="#">Wilmer Deluna</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="3c4b555051594e58595049525d7c59445d514c5059125f5351">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Hospital Administration</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>10 hours ago</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-01.jpg"></a>
                                    <a href="#">Lesley Grauer</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="a5c9c0d6c9c0dcc2d7c4d0c0d7e5c0ddc4c8d5c9c08bc6cac8">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Video Calling App</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>5 Mar 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt=""
                                                                    src="/assets/img/profiles/avatar-16.jpg"></a>
                                    <a href="#">Jeffery Lalor</a>
                                </h2>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="97fdf2f1f1f2e5eefbf6fbf8e5d7f2eff6fae7fbf2b9f4f8fa">[email&#160;protected]</a>
                            </td>
                            <td>9876543210</td>
                            <td><a href="project_view">Office Management</a></td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" title="John Doe" data-bs-toggle="tooltip"><img alt=""
                                                                                                   src="/assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img
                                                alt="" src="/assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-inverse-success">Working</span></td>
                            <td>27 Feb 2019</td>
                            <td class="text-end">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#"><i
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
