<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CommentComponent extends Component
{
    public $comment;
    public $children;
    protected $rules = [
        'comment.body' => 'required|text',
    ];
    public function render()
    {
        return view('livewire.comment-component');
    }
    public function mount()
    {
        $this->children = Comment::where("parent_comment", $this->comment->id)->orderBy('created_at', 'DESC')->get()->all();
    }
    public function update()
    {
        if($this->comment['user_id'] == auth()->user()->id)
        {
            if($this->comment->save()){
                $this->dispatchBrowserEvent('comment-edited');
            };
        }
    }
}
