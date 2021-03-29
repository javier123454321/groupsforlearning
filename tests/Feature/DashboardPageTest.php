<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardPageTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_sees_their_cohorts()
    {
        $user = \App\Models\User::factory()->me()->create();
        $cohorts = \App\Models\Cohort::factory(4)->create();
        $user->cohorts()->attach($cohorts);

        $this->actingAs($user);

        $response = $this->get('/dashboard');
        $response->assertSeeLivewire('view-cohort-members');
        $cohorts->each(function ($cohort) use ($response)  {
            $response->assertSee($cohort->display_name);
        });
    }
}
