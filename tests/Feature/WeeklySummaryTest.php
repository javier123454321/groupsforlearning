<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Thread;
use App\Models\Cohort;
use Tests\TestCase;

class WeeklySummaryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return Array
     */
    private function setupTestContext()
    {
        $user = User::factory()->create();
        $cohort = Cohort::factory()->create();
        DB::table("cohort_user")->insert([
            "cohort_id" => 1,
            "user_id" => $user->id
            ]);
        return [
            "user" => $user,
            "cohort" => $cohort,
        ];
    }

    /**
     * A user can create a thread and see others threads in the summary report
     *
     * @return void
     */
    public function test_user_can_create_a_summary_if_they_have_not_already()
    {
        // [ "user" => $user, "cohort" => $cohort ] = $this->setupTestContext();
        $user = User::factory()->create();
        $cohort = Cohort::factory()->create();
        $response = $this->actingAs($user)
            ->get('/cohorts/' . $cohort->slug . '/week/1');
        $response->assertSeeLivewire("create-thread");
        $response->assertSeeLivewire('show-weekly-summary');
    }
    /**
     * A user sees their threa
     *
     * @return void
     */
    public function test_user_sees_their_summary_if_already_created()
    {
        [ "user" => $user, "cohort" => $cohort ] = $this->setupTestContext();
        $thread = Thread::factory()->create(["user_id" => $user->id, "cohort_id" => $cohort->id]);
        $response = $this->actingAs($user)
            ->get('/cohorts/' . $cohort->slug . '/week/1');
        $response->assertSeeText($thread->last_goal);
    }

    /**
     * A user can comment on their thread
     *
     * @return void
     */
    public function test_user_can_comment_on_their_thread()
    {
        [ "user" => $user, "cohort" => $cohort ] = $this->setupTestContext();
        $thread = Thread::factory()->create(["user_id" => $user->id, "cohort_id" => $cohort->id]);
        $response = $this->actingAs($user)
            ->get('/cohorts/' . $cohort->slug . '/week/1');
        $response->assertSeeLivewire('comments-component');
    }
}
