<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Medicine;
use App\Models\Blood;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Report.index');
    }

    public function patient(Request $request)
    {
        if($request->tf == 1){
            //daily
            return Profile::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //weekly
            return Profile::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //monthly
            return Profile::whereDate('created_at', '>=', now()->subDays(30))->get();
        }
    }

    public function medicine(Request $request)
    {
        if($request->tf == 1){
            return Medicine::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //weekly
            return Medicine::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //monthly
            return Medicine::whereDate('created_at', '>=', now()->subDays(30))->get();
        }
    }

    public function bp(Request $request)
    {
        if($request->tf == 1){
            //daily
            return Blood::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //weekly
            return Blood::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //monthly
            return Blood::whereDate('created_at', '>=', now()->subDays(30))->get();
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
