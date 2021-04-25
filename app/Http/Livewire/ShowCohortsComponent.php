<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowCohortsComponent extends Component
{
    public $cohorts;

    public function render()
    {
        return view('livewire.show-cohorts-component');
    }
}
