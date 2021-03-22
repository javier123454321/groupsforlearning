<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Thread;
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
            'thread_id' => Thread::factory()->create()->id,
            'user_id' => 1,
            'body' => $this->faker->paragraph(),
        ];
    }
}