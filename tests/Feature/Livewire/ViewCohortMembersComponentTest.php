<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ViewCohortMembers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cohort;
use Illuminate\Support\Facades\Log;

class ViewCohortMembersComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * When there are no members, a simple message is displayed
     *
     * @return void
     */
    public function test_shows_if_there_are_no_members()
    {
        $this->actingAs(User::factory()->create());
        $cohort = Cohort::factory()->create();
        Log::debug($cohort);
        Livewire::test(ViewCohortMembers::class, [
            "cohort" => $cohort
            ])
            ->assertSeeHtml('<h2>There are no members in this cohort</h2>');
    }

    /**
     * The component renders all members as a list
     *
     * @return void
     */
    public function test_shows_a_list_of_members()
    {
        $users = User::factory(10)->create();
        $cohort = Cohort::factory()->create();
        foreach(range(1, 10) as $index){
            DB::table("cohort_user")->insert([
                "cohort_id" => 1,
                "user_id" => $index
                ]);
        }
        $this->actingAs($users[0]);
        $livewire = Livewire::test(ViewCohortMembers::class, [
            "cohort" => $cohort
            ])
            ->assertDontSeeHtml('<h2>There are no members in this cohort</h2>');
        foreach(range(0, 9) as $index)
        {
            $livewire->assertSee($users[$index]->name);
        }
    }
}
