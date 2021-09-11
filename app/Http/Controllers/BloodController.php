<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloods = Blood::get();
        return view('Bp.index', compact('bloods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        //$bloods = Blood::get();
        return view('Bp.create', compact(['profile']));
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
          'dp' => 'required',
          'sp' => 'required',
          'check_date' => 'required'
          ]);
        
        try {
        $profile->blood()->create($data);
        //Alert::success('Saved', 'Successfully');
        return redirect('/profile/'. $profile->id)->with('success', 'Saved');
        }
        catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }

        //return redirect()->back()->with('success', 'Created successfully!');
        //return redirect('/profile/'. $profile->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('Bp.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function edit(Blood $blood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blood $blood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blood $blood)
    {
        //
    }
}
