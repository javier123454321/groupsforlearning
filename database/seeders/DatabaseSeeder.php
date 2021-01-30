<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->me()->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Cohort::factory(5)->create();
        foreach(range(1, 10) as $index)
        {
            DB::table("cohort_user")->insert([
                "cohort_id" => 1,
                "user_id" => $index
                ]);
            \App\Models\Thread::factory()->create(["user_id" => $index, "cohort_id" => 1]);
        }
    }
}
