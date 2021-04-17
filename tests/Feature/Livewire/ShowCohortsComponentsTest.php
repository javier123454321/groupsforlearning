<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowCohortsComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowCohortsComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * The Show Cohorts Component shows a list of cohorts.
     *
     * @return void
     */
    public function test_component_renders()
    {
        $cohorts = \App\Models\Cohort::factory(10)->create();
        Livewire::test(ShowCohortsComponent::class, [
            "cohorts" => $cohorts
            ])
            ->assertSee($cohorts[0]->display_name);
    }

}
