<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cohort;
use App\Models\User;
use Tests\TestCase;

class CohortPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cohort_has_a_page()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        $response = $this->get("/cohorts/" . $cohort->slug);
        $response->assertStatus(200);
    }
    public function test_visiting_non_existing_cohort_redirects_to_create_cohort()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get("/cohorts/test");
        $response->assertRedirect("/createcohort");
    }
    public function test_cohort_page_displays_all_members()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        $response = $this->get("/cohorts/" . $cohort->slug);
        $response->assertSeeLivewire("view-cohort-members");
    }
    public function test_user_can_sign_up_to_cohort_if_not_already_a_member()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        $response = $this->get("/cohorts/" . $cohort->slug);
        $response->assertSeeLivewire("join-cohort-component");
    }
}
