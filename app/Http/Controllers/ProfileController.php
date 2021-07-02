<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Work;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::get();
        return view('Profile.index', compact(['profiles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
         
        $data = request()->validate([
          'houseNum' => 'required|numeric',
          'firstname' => 'required|string|max:150|min:2',
          'middlename' => 'required|max:150',
          'lastname' => 'required|max:150|min:2',
          'age' => 'required|numeric',
          'status' => 'required|numeric',
          'gender' => 'required|string'
          ]);
          
        Profile::create($data);
        return ['success'    => 'success'];
      }
      catch(ValidationException $exception){
        return $exception->errors();
      }
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $work = Work::where('profile_id', $profile->id)->first();
        
        $student = Student::where('profile_id', $profile->id)->first();
        
        return view('Profile.show', compact(['profile', 'work', 'student']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('Profile.edit', compact(['profile']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
       $dataOfProfile = request()->validate([
          'houseNum' => 'required',
          'firstname' => 'required',
          'middlename' => 'required',
          'lastname' => 'required',
          'gender' => 'required',
          'age' => 'required'
          ]);
          
       $profile->update($dataOfProfile);
        
       /* 
        if($profile->work)
        {
          
        $dataOfWork = $request->validate([
          'work' => 'required',
          'workplace' => 'required'
          ]);
          
        $profile->work->update($dataOfWork);
          
        }
        
        else if($profile->student)
        {
          
        $dataOfStudent = $request->validate([
          'school' => 'required',
          'educ_level' => 'required',
          'year_level' => 'required'
          ]);
          
          $profile->student->update($dataOfStudent);
          
        }
        */
        return redirect('/profile/'.$profile->id);
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
         $profile->delete();
         return redirect('/profile');
    }
}
