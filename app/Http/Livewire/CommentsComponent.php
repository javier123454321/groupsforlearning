<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentsComponent extends Component
{
    public $allComments;
    public $comment;
    public $weekly;
    public $body;

    protected $rules = [
        'comments' => 'required',
    ];
    public function render()
    {
        return view('livewire.comments-component');
    }
    public function mount()
    {
        $allComments = Comment::where("thread_id", $this->weekly["id"])
            ->where("parent_comment", null)
            ->orderBy('created_at', 'DESC')
            ->get()->all();
        foreach($allComments as $comment)
        {
            $comment["user"] = $comment->user()->first();
        }
        $this->allComments = $allComments;
        Log::debug(count($this->allComments));
    }
    public function save()
    {
        $userId = auth()->user()->id;
        $summaryId = $this->weekly->id;
        $comment = new Comment();
        $comment['user_id'] = $userId;
        $comment['thread_id'] = $summaryId;
        $comment['body'] = $this->body;
        array_unshift($this->allComments, $comment);
        if($comment->save()){
            $this->body = '';
            $this->emit('commented');
        };
    }
}
