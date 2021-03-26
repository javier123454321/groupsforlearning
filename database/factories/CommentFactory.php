<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thread_id' => \App\Models\Thread::factory()->create(),
            'user_id' => \App\Models\User::factory()->create(),
            'body' => $this->faker->paragraph(),
            'parent_comment' => null
        ];
    }
}
