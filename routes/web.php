<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\StudentController;
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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/create', [ProfileController:: class, 'create']);
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profile/{profile}', [ProfileController::class, 'show']);
Route::delete('/profile/{profile}/delete', [ProfileController::class, 'destroy']);
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);

Route::post('/work/{profile}', [WorkController::class, 'store']);
Route::post('/student/{profile}', [StudentController::class, 'store']);