<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Medicine;
use Illuminate\Http\Request;

class ReleaseMedController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        $medicines = Medicine::get();
        return view('Release.create', compact(['profile', 'medicines']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(1);
        return view('Release.index', compact('profiles'));
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
          'medicine_id' => ['required', 'numeric'],
          'date_released' => 'required',
          'quantity' => ['required', 'numeric', 'min:1'],
          'concern' => 'required'
          ]);

         $medicine = Medicine::find($data['medicine_id']);
          

       // $totalQuantity = $medicine->quantity >= $data['quantity'] ? $medicine->quantity - $data['quantity'] : 0;
        
        if($medicine->quantity >= $data['quantity']){
          
          $totalQuantity = $medicine->quantity - $data['quantity'];
        }
        else{
          return redirect()->back()->with('quantityError', 'Quantity should not exceed the selected medicine stocks.' );
        }
        
        $profile->medicine()->attach($data['medicine_id'], $data);
        
        $medicine->update(['quantity' => $totalQuantity
          ]);
          
        return redirect('/profile/'.$profile->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReleaseMed  $releaseMed
     * @return \Illuminate\Http\Response
     */
    public function show(ReleaseMed $releaseMed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReleaseMed  $releaseMed
     * @return \Illuminate\Http\Response
     */
    public function edit(ReleaseMed $releaseMed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReleaseMed  $releaseMed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReleaseMed $releaseMed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReleaseMed  $releaseMed
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReleaseMed $releaseMed)
    {
        //
    }
}
