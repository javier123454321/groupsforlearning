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
    public $userSubmission;
    public function render()
    {
        return view('livewire.show-weekly-summary');
    }
    public function mount($cohortslug)
    {
        $userHasSubmitted = false;
        $cohort = Cohort::where("slug", $cohortslug)->first();
        $this->cohort = $cohort;
        $summaries = WeeklySummary::where("cohort_id", $cohort->id)
                            ->where("week", $this->week)->get();
        foreach($summaries as $summary){
            $isOwn = (Auth::user()->id === $summary->user_id);
            $user = User::find($summary->user_id);
            $summary["is_own"] = $isOwn;
            $summary["user"] = $user;
            if($isOwn){
                $userHasSubmitted = true;
                $this->userSubmission = $summary;
            }
        };
        $cohort["user_has_submitted"] = $userHasSubmitted;
        $this->summaries = $summaries;
    }
}
