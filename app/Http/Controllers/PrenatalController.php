<?php

namespace App\Http\Controllers;

use App\Models\Prenatal;
use App\Models\Profile;
use Illuminate\Http\Request;

class PrenatalController extends Controller
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
    public function create(Profile $profile)
    {
        return view('Prenatal.create', compact(['profile']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profile $profile)
    {
        $data = $request->validate([
            'lmp' => 'required',
            'check_date' => 'required',
            ]);
            
        $profile->prenatal()->create($data);
        return redirect('/prenatal/'. $profile->id.'/create')->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prenatal  $prenatal
     * @return \Illuminate\Http\Response
     */
    public function show(Prenatal $prenatal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prenatal  $prenatal
     * @return \Illuminate\Http\Response
     */
    public function edit(Prenatal $prenatal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prenatal  $prenatal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prenatal $prenatal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prenatal  $prenatal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prenatal $prenatal)
    {
        //
    }
}
