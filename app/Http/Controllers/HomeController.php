<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Medicine;
use App\Models\Checkup;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checkup = Checkup::whereDate('created_at', today())->distinct()->count('profile_id');
        $patient = Profile::whereDate('created_at', today())->count();
        $med = Medicine::whereDate('created_at', today())->count();
        $profiles = Profile::get();
        $medicines = Medicine::get();
        return view('dashboard', compact(['profiles', 'medicines', 'patient', 'med', 'checkup']));
    }
}
