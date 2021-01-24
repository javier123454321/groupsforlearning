<?php

namespace App\Http\Controllers;

use App\Models\weeklysummary;
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

    public function getLatest(){
        return redirect('/freecodecamponehr/week/1');
    }
}
