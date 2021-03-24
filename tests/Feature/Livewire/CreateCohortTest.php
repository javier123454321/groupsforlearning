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
     * A basic feature test example.
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
}
