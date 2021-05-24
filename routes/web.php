<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Vaccination;
use App\Http\Controllers\VaccinationController;

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

Route::get('/', [VaccinationController::class, 'index']);
    //$vaccinations = DB::table('vaccinations')->get();
    //return view('welcome', compact('vaccinations'));

Route::get('/vaccinations', [VaccinationController::class, 'index']);
   // $vaccinations = Vaccination::all();
   // return view('vaccinations.index', compact('vaccinations'));

Route::get('/vaccinations/{id}', [VaccinationController::class, 'show']);
   // $vaccination = Vaccination::find($id);
   // return view('vaccinations.show', compact('vaccination'));

