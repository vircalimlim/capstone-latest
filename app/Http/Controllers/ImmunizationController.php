<?php

namespace App\Http\Controllers;

use App\Models\immunization;
use Illuminate\Http\Request;

class ImmunizationController extends Controller
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
        return view('Immunization.create');
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
     * @param  \App\Models\immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function show(immunization $immunization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function edit(immunization $immunization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, immunization $immunization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function destroy(immunization $immunization)
    {
        //
    }
}
