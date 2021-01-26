<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WeeklySummary;

class CreateWeeklySummary extends Component
{
    public WeeklySummary $weekly_summary;
    public $week;

    protected $rules = [
        'weekly_summary.last_goal' => 'required|text',
        'weekly_summary.last_achievement' => 'required|text',
        'weekly_summary.this_goal' => 'required|text',
    ];
    public function mount()
    {
        $this->weekly_summary = new WeeklySummary();
    }
    public function render()
    {
        return view('livewire.create-weekly-summary');
    }
    public function save()
    {
        $user = auth()->user();
        if(WeeklySummary::where("user_id", $user->id)->where("week", $this->week))
        {
            return error_log("already did a summary report");
        }
        $this->weekly_summary['cohort_id'] = $user->cohorts[0]->id;
        $this->weekly_summary['user_id'] = $user->id;
        $this->weekly_summary['week'] = $this->week;
        $this->weekly_summary->save();
        return redirect('weeklysummary');
    }
}
