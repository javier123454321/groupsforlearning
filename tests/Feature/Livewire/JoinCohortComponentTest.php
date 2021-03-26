<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\JoinCohortComponent;
use App\Models\CohortRequests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Livewire\Livewire;

class JoinCohortComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * The component renders a button if the user is not part of that cohort
     *
     * @return void
     */
    public function test_a_user_sees_a_button_to_join_a_cohort()
    {
        $this->actingAs(\App\Models\User::factory()->create());
        $cohort = \App\Models\Cohort::factory()->create();
        Livewire::test(JoinCohortComponent::class, [
            "cohort" => $cohort
        ])
            ->assertSee("Join")
            ->assertDontSee("You are a member");
    }
    /**
     * The component doesn't render the button if the user is part of that cohort
     *
     * @return void
     */
    public function test_a_member_does_not_see_a_button_to_join_a_cohort()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $cohort = \App\Models\Cohort::factory()->create();
        DB::table("cohort_user")->insert([
                "cohort_id" => $cohort->id,
                "user_id" => $user->id
                ]);
        Livewire::test(JoinCohortComponent::class, [
            "cohort" => $cohort
        ])
            ->assertDontSee("Join")
            ->assertSee("You are a member");
    }
    /**
     * The component renders a button if the user is not part of that cohort
     *
     * @return void
     */
    public function test_a_user_can_request_to_join_a_cohort()
    {
        $user = \App\Models\User::factory()->create();
        $cohort = \App\Models\Cohort::factory()->create();
        $this->actingAs($user);
        Livewire::test(JoinCohortComponent::class, [
            "cohort" => $cohort
        ])
            ->call("join");
    $this->assertTrue(CohortRequests::where('user_id', $user->id)->where('cohort_id', $cohort->id)->exists());
    }
}
