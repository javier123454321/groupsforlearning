<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentsComponent extends Component
{
    public $allComments;
    public Comment $comment;
    public $weekly;
    public $body;

    protected $rules = [
        'comment' => 'required',
    ];
    public function render()
    {
        return view('livewire.comments-component');
    }
    public function mount()
    {
        $allComments = Comment::where("thread_id", $this->weekly["id"])
            ->where("parent_comment", null)
            ->orderBy('created_at', 'ASC')
            ->get();

        $this->allComments = $allComments;
    }
    public function save()
    {
        $comment = new Comment();
        $comment['user_id'] = auth()->user()->id;
        $comment['thread_id'] = $this->weekly->id;
        $comment['body'] = $this->body;
        if($comment->save()){
            $comment->refresh();
            $this->allComments->push($comment);
            $this->body = '';
            $this->emit('commented');
        };
    }
}
