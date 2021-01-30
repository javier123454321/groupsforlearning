<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Thread;

class CreateThread extends Component
{
    public Thread $thread;
    public $week;

    protected $rules = [
        'thread.last_goal' => 'required|text',
        'thread.last_achievement' => 'required|text',
        'thread.this_goal' => 'required|text',
    ];
    public function mount()
    {
        $this->thread = new Thread();
    }
    public function render()
    {
        return view('livewire.create-thread');
    }
    public function save()
    {
        $user = auth()->user();
        if(Thread::where("user_id", $user->id)->where("week", $this->week))
        {
            return error_log("already did a summary report");
        }
        $this->thread['cohort_id'] = $user->cohorts[0]->id;
        $this->thread['user_id'] = $user->id;
        $this->thread['week'] = $this->week;
        $this->thread->save();
        return redirect('thread');
    }
}
