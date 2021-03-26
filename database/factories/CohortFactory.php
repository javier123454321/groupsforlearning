<?php

namespace Database\Factories;

use App\Models\cohort;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = cohort::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            "slug" => \Illuminate\Support\Str::slug($title),
            "display_name" => $title,
            "course" => $this->faker->sentence()
        ];
    }
}
