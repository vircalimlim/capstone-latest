<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ImmunizationController;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ReleaseMedController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HTMLPDFController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PrenatalController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'index')->middleware('guest');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  
Route::view('/dashboard', 'dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/paginate', [ProfileController::class, 'paginated']);
Route::get('/profile/sort', [ProfileController::class, 'sorted']);
Route::get('/profile/search', [ProfileController::class, 'search']);
Route::get('/profile/create', [ProfileController::class, 'create']);
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profile/{profile}', [ProfileController::class, 'show']);
Route::delete('/profile/{profile}/delete', [ProfileController::class, 'destroy']);
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);

Route::get('/importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
Route::get('/export', [ExcelController::class, 'export'])->name('export');
Route::post('/import', [ExcelController::class, 'import'])->name('import');

Route::post('/work/{profile}', [WorkController::class, 'store']);
Route::post('/student/{profile}', [StudentController::class, 'store']);

Route::get('/immunization/create', [ImmunizationController::class, 'create']);

Route::get('/bp', [BloodController::class, 'index']);
Route::get('/bp/{profile}', [BloodController::class, 'create']);
Route::post('/bp/{profile}', [BloodController::class, 'store']);
Route::get('/bp/{profile}/show', [BloodController::class, 'show']);

Route::get('/medicine', [MedicineController::class, 'index']);
Route::get('/medicine/paginate', [MedicineController::class, 'paginated']);
Route::get('/medicine/sort', [MedicineController::class, 'sorted']);
Route::get('/medicine/search', [MedicineController::class, 'search']);
Route::get('/medicine/create', [MedicineController::class, 'create']);
Route::post('/medicine', [MedicineController::class, 'store']);
Route::delete('/medicine/{medicine}/delete', [MedicineController::class, 'destroy']);
Route::get('/medicine/{medicine}/edit', [MedicineController::class, 'edit']);
Route::patch('/medicine/{medicine}', [MedicineController::class, 'update']);

Route::get('/releasemed', [ReleaseMedController::class, 'index']);
Route::get('/releasemed/{profile}', [ReleaseMedController::class, 'create']);
Route::post('/releasemed/{profile}', [ReleaseMedController::class, 'store']);
Route::get('/releasemed/{profile}/show', [ReleaseMedController::class, 'show']);

Route::get('/html-pdf', [HTMLPDFController::class, 'htmlPdf'])->name('htmlPdf');

Route::get('/vaccine/{profile}', [VaccineController::class, 'create']);
Route::post('/vaccine/{profile}', [VaccineController::class, 'store']);
Route::get('/vaccine/{profile}/show', [VaccineController::class, 'show']);

Route::get('/checkup/{profile}', [CheckupController::class, 'create']);
Route::post('/checkup/{profile}', [CheckupController::class, 'store']);
Route::get('/checkup/{profile}/show', [CheckupController::class, 'show']);

Route::get('/prenatal/{profile}/create', [PrenatalController::class, 'create']);
Route::post('/prenatal/{profile}', [PrenatalController::class, 'store']);
Route::get('/prenatal/{profile}/show', [PrenatalController::class, 'show']);

Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/patient', [ReportController::class, 'patient']);
Route::get('/report/medicine', [ReportController::class, 'medicine']);
Route::get('/report/releasemed', [ReportController::class, 'releasemed']);
Route::get('/report/bp', [ReportController::class, 'bp']);
Route::get('/report/checkup', [ReportController::class, 'checkup']);
Route::get('/report/immunization', [ReportController::class, 'immunization']);
Route::get('/report/prenatal', [ReportController::class, 'prenatal']);
});