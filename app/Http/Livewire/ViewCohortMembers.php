<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cohort;

class ViewCohortMembers extends Component
{
    public $cohort;
    public $members;
    public function render()
    {
        return view('livewire.view-cohort-members');
    }
    public function mount()
    {
        $this->members = Cohort::find($this->cohort)->users;
    }
}
