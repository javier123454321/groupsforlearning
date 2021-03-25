<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JoinCohortComponent extends Component
{
    public $cohort;
    public function render()
    {
        return view('livewire.join-cohort-component');
    }
}
