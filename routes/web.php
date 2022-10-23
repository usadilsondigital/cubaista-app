<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\CubaistaController;
use App\Http\Controllers\CountryController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(CustomRegisterController::class)->group(function () {

    Route::post('/store', 'store');
});

Route::controller(CubaistaController::class)->group(function () {

    /*Route::get('/profiles', 'index'); */
    Route::get('/profiles/create', 'create');
    Route::post('/cubaista', 'store');
    /* Route::get('/profiles/{profile}', 'show'); 
    Route::get('/profiles/{profile}/edit', 'edit'); 
    Route::put('/profiles/{profile}', 'update')->name("profiles.update");  
    Route::patch('/profiles/{profile}', 'update');  
    
    Route::delete('/profiles/{profile}', 'delete');    
    Route::get('/profiles/{profile}/delete', 'destroy'); */
});

Route::controller(CountryController::class)->group(function () {
    Route::get('/country', 'index');
    Route::get('/country/create', 'create');
    Route::post('/country', 'store');
});



require __DIR__ . '/auth.php';
