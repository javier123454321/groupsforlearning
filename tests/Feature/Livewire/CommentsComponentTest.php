<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CommentsComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CommentsComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * The Cohort component creates a new cohort on save.
     *
     * @return void
     */
    public function test_comments_component_saves_comment_input()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        Livewire::test(CommentsComponent::class, [
            "weekly" => \App\Models\Thread::factory()->create()
            ])
            ->set('body', 'foo')
            ->call('save')
            ->assertSee('foo');

        $this->assertTrue(
            \App\Models\Comment::
            where('body', 'foo')
            ->where('user_id', $user->id)
            ->exists()
        );
    }

}
