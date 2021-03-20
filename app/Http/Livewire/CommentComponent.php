<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentComponent extends Component
{
    public $comment;
    public function render()
    {
        return view('livewire.comment-component');
    }
}
