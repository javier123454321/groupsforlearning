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
        \App\Models\Cohort::factory()->create();
        foreach(range(1, 10) as $index)
        {
            DB::table("cohort_user")->insert([
                "cohort_id" => 1,
                "user_id" => $index
                ]);
            \App\Models\Thread::factory()->create(["user_id" => $index, "cohort_id" => 1]);
            \App\Models\Comment::factory()->create(["user_id" => $index, "thread_id" => $index]);
        }

        foreach(range(1, 29) as $index)
        {
            \App\Models\Comment::factory(10)->create(["parent_comment" => rand(0,29), "thread_id" => 1, "user_id" => rand(1 , 10), "thread_id" => $index]);
        }
    }
}
