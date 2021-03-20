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
        'comments.body' => 'required|text',
    ];
    public function mount()
    {
        $allComments = Comment::where("thread_id", $this->weekly["id"])->orderBy('created_at', 'DESC')->get()->all();
        foreach($allComments as $comment)
        {
            $comment["user"] = $comment->user()->first();
            Log::debug($comment['body']);
        }
        $this->allComments = $allComments;
        $this->comment = new Comment();
    }
    public function render()
    {
        return view('livewire.comments-component');
    }
    public function save()
    {
        $userId = auth()->user()->id;
        $summaryId = $this->weekly->id;
        $this->comment['user_id'] = $userId;
        $this->comment['thread_id'] = $summaryId;
        $this->comment['body'] = $this->body;
        if($this->comment->save()){
            array_unshift($this->allComments, $this->comment);
            $this->body = '';
            $this->emit('commented');
        };
    }
    public function edit($comment, $body)
    {
        if($comment['user'] == auth()->user())
        {
            $comment['body'] = $body;

        }
        Log::debug($comment);
        return true;
    }

}
