<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
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
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(thread $thread)
    {
        //
    }

    public function showByWeek($slug, $week)
    {
        $cohortName = Cohort::where('slug', $slug)->first()->display_name;
        return view('weeklysummary', ['slug' => $slug, 'week' => $week, 'cohortName' => $cohortName]);
    }

    public function getLatest(string $cohort)
    {
        $cohort = Cohort::where("slug", $cohort)->first();
        $latestWeek = Thread::where('cohort_id', $cohort->id)->orderBy('week', 'DESC')->first();
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
