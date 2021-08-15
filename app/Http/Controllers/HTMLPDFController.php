<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Profile;

class HTMLPDFController extends Controller
{
    public function htmlPdf()
    {
        $profiles = Profile::get();
        // selecting PDF view
        $pdf = PDF::loadView('Profile.index', compact('profiles'));

        // download pdf file
        return $pdf->download('patients-list.pdf');
    }

}
