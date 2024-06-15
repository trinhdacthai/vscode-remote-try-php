
<div class="sidebar" id="sidebar" >
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->user_type == 1 || (\Illuminate\Support\Facades\Auth::guard('admin')->user()->user_type == 2 &&\Illuminate\Support\Facades\Auth::guard('admin')->user()->role_id !=null))

                    <h3> Quản lý hệ thống</h3>

                @foreach($page->where('page_type',0) as $item)
                <li class="{{$item->is_page == 0?'submenu':""}} {{strpos(url()->current(),$item->page_url) != false?'active':""}}">
                    <a href="{{$item->page_url}}">{!! $item->page_icon !!} <span>{{$item->page_name}}</span>
                        @if($item->is_page == 0)
                        <span  class="menu-arrow"></span>
                        @endif
                    </a>
                    @if($item->child->count()>0)
                    <ul style="display: none;">
                    @foreach($item->child as $i)
                        <li><a class="{{(strpos(url()->current(),$i->page_url)) != false?"active":null}}" href="{{$i->page_url}}">{{$i->page_name}}</a></li>
                   @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif

                    <h3>Quản lý công việc</h3>
   
                @foreach($page->where('page_type',1) as $item)
                    <li class="{{$item->is_page == 0?'submenu':""}} {{strpos(url()->current(),$item->page_url) != false?'active':""}}">
                        <a href="{{$item->page_url}}">{!! $item->page_icon !!} <span>{{$item->page_name}}</span>
                            @if($item->is_page == 0)
                                <span  class="menu-arrow"></span>
                            @endif
                        </a>
                        @if($item->child->count()>0)
                            <ul style="display: none;">
                                @foreach($item->child as $i)
                                    <li><a class="{{(strpos(url()->current(),$i->page_url)) != false?"active":null}}" href="{{$i->page_url}}">{{$i->page_name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
