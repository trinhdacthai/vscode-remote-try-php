
    <div class="row">
        @foreach($param['list'] as $i)
            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="project-title text-center"><a href="{{route('du-an.chi-tiet',$i->project_url)}}">{{$i->project_name}}</a></h4>
                        <small class="block text-ellipsis m-b-15 text-center">
                            <span class="text-xs">{{$i->task->where('task_status_id','=',4)->count()}}</span> <span class="text-muted"> hoàn thành</span>

                            <span class="text-xs">{{$i->task->where('task_status_id','<>',4)->count()}}</span> <span class="text-muted"> đang chạy</span>
                        </small>
                        <p class="text-muted">{{$i->project_description}}
                        </p>
                        
                        <div class="project-members m-b-15">
                            <div>Trưởng dự án:</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-bs-toggle="tooltip" title="{{$i->lead->user_detail->fullname}}">
                                        <img alt="" src="{{asset($i->lead->avatar??"uploads/avatar/avatar_defaul.png")}}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="project-members m-b-15">
                            <div>Thành viên:</div>
                            <ul class="team-members">
                                @foreach($i->implementer as $ii)
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="{{$ii->user->user_detail->fullname}}"><img alt=""
                                                                                                                                 src="{{asset($ii->user->avatar??"uploads/avatar/avatar_defaul1.png")}}"></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pro-deadline m-b-15">
                            <div class="sub-title">
                                Ngày bắt đầu:
                            </div>
                            <div class="text-muted">
                                {{App\Helper\DateHelper::date($i->date_start)}}
                            </div>
                        </div>
                        <div class="pro-deadline m-b-15">
                            <div class="sub-title">
                                Ngày kết thúc:
                            </div>
                            <div class="text-muted">
                                {{App\Helper\DateHelper::date($i->date_end)}}
                            </div>
                        </div>
                        <p class="m-b-5">Quá hạn: <span class="text-danger float-end">
                            {{-- <span class="{{$times >0 ? 'text-success' :'text-danger'}}  float-end">{{$times}}%</span> --}}

                            ( {{\Carbon\Carbon::parse()->diffInDays($i->date_end)}} Ngày)
                        </p>
                        <p class="m-b-5">Tiến độ: <span class="text-success float-end">{{($i->task->where('task_status_id','=',4)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%</span></p>
                        <div class="progress progress-xs mb-0">
                            <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                 title="{{($i->task->where('task_status_id','=',4)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%" style="width: {{($i->task->where('task_status_id','=',4)->count()/($i->task->count()!=0?$i->task->count():1))*100}}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



<div id="create_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Project</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Client</label>
                                <select class="select">
                                    <option>Global Technologies</option>
                                    <option>Delta Infotech</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Rate</label>
                                <input placeholder="$50" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <select class="select">
                                    <option>Hourly</option>
                                    <option>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select">
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Project Leader</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Leader</label>
                                <div class="project-members">
                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-16.jpg"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Team</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Members</label>
                                <div class="project-members">
                                    <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                        <img src="/assets/img/profiles/avatar-16.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-09.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                        <img src="/assets/img/profiles/avatar-10.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-05.jpg"
                                             alt="">
                                    </a>
                                    <span class="all-team">+2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control summernote"
                                  placeholder="Enter your message here"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="edit_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Project</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" value="Project Management" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Client</label>
                                <select class="select">
                                    <option>Global Technologies</option>
                                    <option>Delta Infotech</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Rate</label>
                                <input placeholder="$50" class="form-control" value="$5000" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <select class="select">
                                    <option>Hourly</option>
                                    <option selected>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select">
                                    <option selected>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Project Leader</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Leader</label>
                                <div class="project-members">
                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-16.jpg"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Team</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Members</label>
                                <div class="project-members">
                                    <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                        <img src="/assets/img/profiles/avatar-16.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-09.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                        <img src="/assets/img/profiles/avatar-10.jpg"
                                             alt="">
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"
                                       class="avatar">
                                        <img src="/assets/img/profiles/avatar-05.jpg"
                                             alt="">
                                    </a>
                                    <span class="all-team">+2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control"
                                  placeholder="Enter your message here"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal custom-modal fade" id="delete_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Project</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-bs-dismiss="modal"
                               class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
