<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LatestSummaryPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * If there is no cohort on record, the user gets redirected to create that cohort.
     *
     * @return void
     */
    public function test_going_to_latest_summary_redirects_to_create_cohort_if_there_is_none()
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/cohorts/notacohort/latestsummary');

        $response->assertRedirect('/createcohort');
    }
    /**
     * If there are no summaries in the records and a user is part of that cohort, a user gets redirected to the create summary route.
     *
     * @return void
     */
    public function test_going_to_latest_summary_redirects_to_create_summary()
    {
        $cohort = \App\Models\Cohort::factory()->create();
        $user = \App\Models\User::factory()->create();
        DB::table("cohort_user")->insert([
            "user_id" => $user->id,
            "cohort_id" => $cohort->id
        ]);
        $this->actingAs($user);

        $response = $this->get('/cohorts/' . $cohort->slug . '/latestsummary');

        $response->assertRedirect('/cohorts/' . $cohort->slug . '/createsummary');
    }
    /**
     * The user gets redirected to the latest summary
     *
     * @return void
     */
    public function test_going_to_latest_summary_redirects_to_last_created_summary()
    {
        $cohort = \App\Models\Cohort::factory()->create();
        $users = \App\Models\User::factory(10)->create();
        foreach(range(0, 9) as $index)
        {
            DB::table("cohort_user")->insert([
                "cohort_id" => $cohort->id,
                "user_id" => $users[$index]->id
                ]);
            \App\Models\Thread::factory()->create(["user_id" => $users[$index]->id, "cohort_id" => $cohort->id]);
        }
        $this->actingAs($users[0]);

        $response = $this->get('/cohorts/' . $cohort->slug . '/latestsummary');
        $response->assertRedirect('/cohorts/' . $cohort->slug . '/week/1');

        \App\Models\Thread::factory()->create(["user_id" => $users[1]->id, "cohort_id" => $cohort->id, "week" => 2]);
        $response = $this->get('/cohorts/' . $cohort->slug . '/latestsummary');
        $response->assertRedirect('/cohorts/' . $cohort->slug . '/week/2');
    }
}
