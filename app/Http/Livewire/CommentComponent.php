<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentComponent extends Component
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
        $this->allComments = Comment::where("weekly_summary_id", $this->weekly["id"])->orderBy('created_at', 'DESC')->get()->all();
        $this->comment = new Comment();
    }
    public function render()
    {
        return view('livewire.comment-component');
    }
    public function save()
    {
        $userId = auth()->user()->id;
        $summaryId = $this->weekly->id;
        $this->comment['user_id'] = $userId;
        $this->comment['weekly_summary_id'] = $summaryId;
        $this->comment['body'] = $this->body;
        array_push($this->allComments, $this->comment);
        $this->comment->save();
    }

}
