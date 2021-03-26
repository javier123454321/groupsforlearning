<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CohortRequests extends Model
{
    use HasFactory;
    public static function create(\App\Models\User $user, \App\Models\Cohort $cohort)
    {
        $request = new CohortRequests();
        if($cohort->is_private){
            $request->status = 1;
        } else {
            $request->status = 0;
        }
        $request->user_id = $user->id;
        $request->cohort_id = $cohort->id;
        $request->save();
    }
}
