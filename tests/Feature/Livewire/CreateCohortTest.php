<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateCohortComponent;
use App\Models\Cohort;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CreateCohortTest extends TestCase
{
    use RefreshDatabase;
    /**
     * The Cohort component creates a new cohort on save.
     *
     * @return void
     */
    public function test_create_cohort_component_saves()
    {
        $this->actingAs(User::factory()->create());
        Livewire::test(CreateCohortComponent::class)
            ->set('displayName', 'foo')
            ->set('course', 'bar')
            ->call('save');

        $this->assertTrue(Cohort::where('display_name', 'foo')->exists());
        $this->assertTrue(Cohort::where('course', 'bar')->exists());
    }
    /**
     *
     * @return void
     */
    public function test_after_saving_user_gets_redirected_to_summary()
    {
        $this->actingAs(User::factory()->create());
        Livewire::test(CreateCohortComponent::class)
            ->set('displayName', 'foo')
            ->set('course', 'bar')
            ->call('save')
            ->assertRedirect("/cohorts/foo/week/1")
            ->assertStatus(200);
    }
}
