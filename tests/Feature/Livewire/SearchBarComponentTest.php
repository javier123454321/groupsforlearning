<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchBarComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cohort;
use Illuminate\Support\Facades\Log;

class SearchBarComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * When there are no members, a simple message is displayed
     *
     * @return void
     */
    public function test_shows_if_there_are_no_members()
    {
        Livewire::test(SearchBarComponent::class, [
            "searchTerm" => "Foo"
            ])->call('search')
            ->assertRedirect("search?q=Foo");
    }
}