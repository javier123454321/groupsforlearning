<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchBarComponent extends Component
{
    public $searchTerm;

    public function render()
    {
        return view('livewire.search-bar-component');
    }
    public function search(){
        return redirect()->route('search', ['q' => $this->searchTerm]);
    }
}
