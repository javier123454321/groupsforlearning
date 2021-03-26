<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JoinCohortComponent extends Component
{
    public $cohort;
    public function render()
    {
        return view('livewire.join-cohort-component');
    }
    public function join()
    {
        \App\Models\CohortRequests::create(auth()->user(), $this->cohort);
    }
}
