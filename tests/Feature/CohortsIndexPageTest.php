<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CohortIndexPageTest extends TestCase
{

    use RefreshDatabase;
    /**
     *
     * @return void
     */
    public function test_page_renders()
    {
        $user = \App\Models\User::factory()->me()->create();
        $cohorts = \App\Models\Cohort::factory(4)->create();
        $user->cohorts()->attach($cohorts);

        $this->actingAs($user);

        $response = $this->get('/cohorts');
        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_a_user_sees_a_list_of_groups_they_belong_to()
    {
        $user = \App\Models\User::factory()->me()->create();
        $cohorts = \App\Models\Cohort::factory(4)->create();
        $user->cohorts()->attach($cohorts);

        $this->actingAs($user);

        $response = $this->get('/cohorts');
        $response->assertSeeLivewire('show-cohorts-component');
        $response->assertSee($cohorts[0]->display_name);
    }

    /**
     *
     * @return void
     */
    public function test_a_user_sees_a_list_of_groups_according_to_their_recommendations()
    {
        $user = \App\Models\User::factory()->me()->create();
        $cohorts = \App\Models\Cohort::factory(4)->create();

        $this->actingAs($user);

        $response = $this->get('/cohorts');
        $response->assertSeeLivewire('show-cohorts-component');
        $response->assertSee($cohorts[0]->display_name);
    }
}
