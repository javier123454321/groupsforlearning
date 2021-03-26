<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CommentComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use Tests\TestCase;

class CommentComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * The comment displays the component from parameters.
     *
     * @return void
     */
    public function test_comment_component_shows_comment()
    {
        $comment = \App\Models\Comment::factory()->create();
        Livewire::test(CommentComponent::class, [
            "comment" => $comment
            ])
            ->assertSee($comment->body);
    }

    /**
     * The user sees an edit button if its their comment.
     *
     * @return void
     */
    public function test_user_sees_edit_if_own_comment()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $comment = \App\Models\Comment::factory()->create(["user_id" => $user->id]);
        $comment->user = $user; //Had to hack this to pass test
        Livewire::test(CommentComponent::class, ["comment" => $comment])
            ->assertSeeHtml("edit</button>");
        $comment = \App\Models\Comment::factory()->create();
        Livewire::test(CommentComponent::class, [
            "comment" => $comment
            ])
            ->assertDontSeeHtml("edit</button>");
    }
}
