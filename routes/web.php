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

        $random = rand(10000, 99999);
        $im = imagecreatetruecolor(200, 30);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 200, 29, $white);
        $text = $random;
        $font = './arial.ttf';
        imagettftext($im, 30, 0, 10, 30, $black, $font, $text);
        ob_start();
        imagepng($im);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($im);
        /*Image First*/
       
    return view('welcome', array('data' => $imstr,'random' => $random ));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(CustomRegisterController::class)->group(function () {
    Route::get('/mail/{email}', 'mail');
    Route::post('/mail/store', 'store');
});

Route::controller(CubaistaController::class)->group(function () {

    Route::get('/cubaista', 'index');
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
