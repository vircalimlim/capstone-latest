<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProfilesExport;
use App\Imports\ProfilesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ProfilesExport, 'profiles.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ProfilesImport, request()->file('file'));
             
        return back();
    }

   
}
