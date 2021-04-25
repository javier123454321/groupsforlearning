<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        \App\Models\Cohort::factory(15)->create(["start_time" => Carbon::create(2021, 10, 10, 10)]);
        foreach(range(1, 15) as $index)
        {
            DB::table("cohort_user")->insert([
                "cohort_id" => 1,
                "user_id" => $index
                ]);
            \App\Models\Thread::factory()->create(["user_id" => $index, "cohort_id" => 1]);
            \App\Models\Comment::factory()->create(["user_id" => $index, "thread_id" => $index]);
            if($index % 2 == 0)
            {
              DB::table("cohort_user")->insert([
                "cohort_id" => $index,
                "user_id" => 1
                ]);
            }
        }

        foreach(range(1, 29) as $index)
        {
            \App\Models\Comment::factory(10)->create(["parent_comment" => rand(0,29), "thread_id" => 1, "user_id" => rand(1 , 10), "thread_id" => $index]);
        }
        \App\Models\Cohort::factory(15)->create(["start_time" => Carbon::now()]);
    }
}
