<?php

namespace Database\Factories;

use App\Models\CohortRequests;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortRequestsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CohortRequests::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "is_private" => false,
            "user_id" => \App\Models\User::factory()->create(),
            "cohort_id" => \App\Models\Cohort::factory()->create(),
        ];
    }
}
