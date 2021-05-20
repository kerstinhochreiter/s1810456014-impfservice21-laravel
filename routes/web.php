<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Vaccination;

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

Route::get('/', function () {
    $vaccinations = DB::table('vaccinations')->get();
    return view('welcome', compact('vaccinations'));
});
Route::get('/vaccinations', function () {
    $vaccinations = Vaccination::all();
    return view('vaccinations.index', compact('vaccinations'));
});

Route::get('/vaccinations/{id}', function ($id) {
    $vaccination = Vaccination::find($id);
    return view('vaccinations.show', compact('vaccination'));
});
