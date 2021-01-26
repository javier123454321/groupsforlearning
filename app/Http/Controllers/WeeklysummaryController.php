<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\WeeklySummary;
use Illuminate\Http\Request;

class WeeklysummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Models\weeklysummary  $weeklysummary
     * @return \Illuminate\Http\Response
     */
    public function show(weeklysummary $weeklysummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\weeklysummary  $weeklysummary
     * @return \Illuminate\Http\Response
     */
    public function edit(weeklysummary $weeklysummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\weeklysummary  $weeklysummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, weeklysummary $weeklysummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\weeklysummary  $weeklysummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(weeklysummary $weeklysummary)
    {
        //
    }

    public function showByWeek($slug, $week)
    {
        $cohortName = Cohort::where('slug', $slug)->first()->display_name;
        return view('weeklysummary', ['slug' => $slug, 'week' => $week, 'cohortName' => $cohortName]);
    }

    public function getLatest()
    {
        $cohort = auth()->user()->cohorts[0];
        $latestWeek = WeeklySummary::where('cohort_id', $cohort->id)->orderBy('week', 'DESC')->first();
        if(!$latestWeek){
            return redirect('/createsummary');
        }
        return redirect('/'.$cohort->slug.'/week/'.$latestWeek->week);
    }
    public function getCreate()
    {
        return view('createsummary');
    }
}
