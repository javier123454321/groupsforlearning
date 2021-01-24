<?php

namespace App\Http\Livewire;

use App\Models\Cohort;
use App\Models\WeeklySummary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowWeeklySummary extends Component
{
    public $summaries;
    public $cohort;
    public $week;
    public function render()
    {
        return view('livewire.show-weekly-summary');
    }
    public function mount($cohort)
    {
        $cohort = Cohort::where("name", $cohort)->first();
        $this->cohort = $cohort;
        $summaries = WeeklySummary::where("cohort_id", $cohort->id)
                            ->where("week", $this->week)->get();
        foreach($summaries as $summary){
            $summary["user"] = User::find($summary->user_id);
        };
        $this->summaries = $summaries;
    }
}
