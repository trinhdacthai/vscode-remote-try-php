<?php

namespace App\View\Components\Home;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ListProjectMe extends Component
{
    public $param;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->param['list'] = Project::Wherehas('implementer_me')
            ->orWhere('lead_id',Auth::guard('admin')->id())->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.list-project-me');
    }
}
