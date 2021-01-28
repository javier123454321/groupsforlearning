<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cohort_id' => 1,
            'user_id' => 1,
            'week' => 1,
            'last_goal' => $this->faker->paragraph(),
            'last_achievement' => $this->faker->paragraph(),
            'this_goal' => $this->faker->paragraph(),
        ];
    }
}
