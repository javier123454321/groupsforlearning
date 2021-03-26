<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CommentComponent;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

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
    /**
     * The user can reply to a comment.
     *
     * @return void
     */
    public function test_user_can_reply_to_comment()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $comment = \App\Models\Comment::factory()->create();
        Livewire::test(CommentComponent::class, ["comment" => $comment])
            ->set("reply", "foo")
            ->call("reply")
            ->assertSee("foo");

        assertTrue(
            Comment::where("body", "foo")
            ->where("parent_comment", $comment->id)
            ->exists()
        );
    }

}