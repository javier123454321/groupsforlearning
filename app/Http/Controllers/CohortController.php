<?php

namespace App\Http\Controllers;

use App\Models\cohort;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('cohorts', [
         "cohorts" => Auth()->user()->cohorts()->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showOne(Request $request)
    {
        $cohort = Cohort::firstWhere("slug", $request->cohort);
        if($cohort === null)
        {
            return redirect("createcohort");
        };
        return view("cohort-page", ["cohort" => $cohort]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function edit(cohort $cohort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cohort $cohort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function destroy(cohort $cohort)
    {
        //
    }
     public function showCreateCohortView()
     {
         return view("livewire.create-cohort-component");
     }
}
