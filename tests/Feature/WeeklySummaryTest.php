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
     * @return void
     */
    private function setupTestContext()
    {
        $user = User::factory()->create();
        $cohort = Cohort::factory()->create();
        DB::table("cohort_user")->insert([
            "cohort_id" => 1,
            "user_id" => $user->id
            ]);
        \App\Models\Thread::factory()->create(["user_id" => $user->id, "cohort_id" => 1]);
        $thread = Thread::factory()->create(['user_id' => $user->id]);
        return [
            "user" => $user,
            "cohort" => $cohort,
            "thread" => $thread,
        ];
    }

    public function test_user_gets_redirected_to_their_summary()
    {
        [ "user" => $user, "cohort" => $cohort, "thread" => $thread ] = $this->setupTestContext();
        $response = $this->actingAs($user)
            ->get('/' .$cohort->slug . '/latestsummary');
        $response->assertRedirect('/' . $cohort->slug . '/week/' . $thread->week);
    }
}
