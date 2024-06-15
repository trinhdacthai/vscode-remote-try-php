<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Task extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $task;
    public $type;
    public $member;
    public function __construct($id ,$type)
    {
        $this->type = $type;
        $task = \App\Models\Task::query()->find($id);
        $this->task = $task;
        $member = [];
//        dd($task->project->implementer, $task->task_implementer->pluck('user_id') ?? []);
        foreach ($task->project->implementer as $i) {
            if (!in_array( $i->user_id, ($task->task_implementer->pluck('user_id')->toArray() ?? []) )) {
                array_push($member, $i);
            }
        }
        $this->member = $member;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.task');
    }
}
