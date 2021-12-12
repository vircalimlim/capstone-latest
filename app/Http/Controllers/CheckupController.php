<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Profile;
use Illuminate\Http\Request;

class CheckupController extends Controller
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
        
        return view('Checkup.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profile $profile)
    {
        //dd($profile);
        $data = $request->validate([
            'med_concern' => 'required',
            'check_date' => 'required',
            ]);
            
        $profile->checkup()->create($data);
        return redirect('/checkup/'. $profile->id)->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return \Illuminate\Http\Response
     */
    public function show(Checkup $checkup, Profile $profile)
    {
        $profiles = $profile->checkup()->paginate(10);
        return view('Checkup.show', compact(['profile', 'profiles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkup $checkup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkup  $checkup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkup $checkup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkup $checkup)
    {
        //
    }
}
