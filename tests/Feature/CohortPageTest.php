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
     * Each cohort should have a 'landing page'.
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

    /**
     * If a user navigates to a non-existent cohort page, they will be met with 
     * the create cohort page 
     *
     * @return void
     */
    public function test_visiting_non_existing_cohort_redirects_to_create_cohort()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get("/cohorts/test");
        $response->assertRedirect("/createcohort");
    }

    /**
     * A user is met with the list of cohort members in a page
     *
     * @return void
     */
    public function test_cohort_page_displays_all_members()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        $response = $this->get("/cohorts/" . $cohort->slug);
        $response->assertSeeLivewire("view-cohort-members");
    }

    /**
     * A user can sign up to a cohort if they are not already a member
     *
     * @return void
     */
    public function test_user_can_sign_up_to_cohort_if_not_already_a_member()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        $response = $this->get("/cohorts/" . $cohort->slug);
        $response->assertSeeLivewire("join-cohort-component");
    }
}
