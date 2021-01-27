<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentComponent extends Component
{
    public $comment;
    public $weekly;

    protected $rules = [
        'threads.body' => 'required|text',
    ];
    public function mount()
    {
        $this->comment = new Comment();
    }
    public function render()
    {
        return view('livewire.comment-component');
    }

}
