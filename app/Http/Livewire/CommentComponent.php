<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use Livewire\Component;

class CommentComponent extends Component
{
    public Comment $comment;
    public $children;
    public $reply;
    protected $rules = [
        'comment.body' => 'required|text',
        'reply' => 'reuired|text'
    ];
    public function render()
    {
        return view('livewire.comment-component');
    }
    public function mount()
    {
        $this->children = Comment::where("parent_comment", $this->comment->id)->orderBy('created_at', 'ASC')->get();
    }
    public function reply()
    {
        $comment = new Comment();
        $comment["parent_comment"] = $this->comment->id;
        $comment["body"] = $this->reply;
        $comment["thread_id"] = $this->comment->thread_id;
        $comment["user_id"] = auth()->user()->id;
        if($comment->save())
        {
            $comment->refresh();
            $this->reply = '';
            $this->children->push($comment);
            $this->dispatchBrowserEvent('replied-to-comment');
        }
    }
    public function update()
    {
        if($this->comment['user_id'] == auth()->user()->id)
        {
            if($this->comment->save())
            {
                $this->dispatchBrowserEvent('comment-edited');
            };
        }
    }
}
