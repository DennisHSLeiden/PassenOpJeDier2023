<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.register');
});

// Route::middleware(['auth', 'blocked'])->group(function(){
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@show')->middleware(['auth', 'blocked'])->name('dashboard');

Route::post('/addHuisdier', 'App\Http\Controllers\AddHuisdierController@addHuisdier')->middleware(['auth', 'blocked'])->name('dashboard');

Route::post('/addAanvraag', 'App\Http\Controllers\AanvraagController@addAanvraag')->middleware(['auth', 'blocked'])->name('dashboard');
Route::get('/aanvraag-details/{id}/', 'App\Http\Controllers\AanvraagController@show')->middleware(['auth', 'blocked'])->name('dashboard');


Route::get('/addReactie/{id}', 'App\Http\Controllers\ReactieController@show')->middleware(['auth', 'blocked'])->name('dashboard');
Route::post('/addReactie/{id}/aanmaken', 'App\Http\Controllers\ReactieController@addReactie')->middleware(['auth', 'blocked'])->name('dashboard');
Route::post('/reageer/{id}', 'App\Http\Controllers\ReactieController@Reageer')->middleware(['auth', 'blocked'])->name('dashboard');

Route::get('/admin', 'App\Http\Controllers\AdminController@Show')->middleware(['auth', 'blocked', 'admin'])->name('dashboard');
Route::delete('/admin/{id}/verwijder', 'App\Http\Controllers\AanvraagController@verwijder')->middleware(['auth', 'blocked', 'admin'])->name('dashboard');
Route::get('/admin/{email}/blokkeer', 'App\Http\Controllers\AdminController@blokkeer')->middleware(['auth', 'blocked', 'admin'])->name('dashboard');

Route::get('/blocked', 'App\Http\Controllers\BlockController@show');

// });



require __DIR__.'/auth.php';






