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

Route::post('/addHuisdier', 'App\Http\Controllers\AddHuisdierController@addHuisdier')->middleware(['auth', 'blocked']);

Route::post('/addAanvraag', 'App\Http\Controllers\AanvraagController@addAanvraag')->middleware(['auth', 'blocked']);
Route::get('/aanvraag-details/{id}/', 'App\Http\Controllers\AanvraagController@show')->middleware(['auth', 'blocked']);


Route::get('/addReactie/{id}', 'App\Http\Controllers\ReactieController@show')->middleware(['auth', 'blocked']);
Route::post('/addReactie/{id}/aanmaken', 'App\Http\Controllers\ReactieController@addReactie')->middleware(['auth', 'blocked']);
Route::post('/reageer/{id}', 'App\Http\Controllers\ReactieController@Reageer')->middleware(['auth', 'blocked']);

Route::get('/stelreviewsbeschikbaar/{id}', 'App\Http\Controllers\ReviewController@beschikbaarstellen')->name('stelreviewsbeschikbaar');

Route::get('/reviewHuisdier/{id}', 'App\Http\Controllers\ReviewController@showHuisdier')->middleware(['auth', 'blocked']);
Route::post('/reviewHuisdier/{id}/geven', 'App\Http\Controllers\ReviewController@reviewHuisdierGeven')->middleware(['auth', 'blocked']);

Route::get('/reviewOppasser/{email}', 'App\Http\Controllers\ReviewController@showOppasser')->middleware(['auth', 'blocked']);
Route::post('/reviewOppasser/{email}/geven', 'App\Http\Controllers\ReviewController@reviewOppasserGeven')->middleware(['auth', 'blocked']);



Route::get('/admin', 'App\Http\Controllers\AdminController@Show')->middleware(['auth', 'blocked', 'admin']);
Route::delete('/admin/{id}/verwijder', 'App\Http\Controllers\AanvraagController@verwijder')->middleware(['auth', 'blocked', 'admin']);
Route::get('/admin/{email}/blokkeer', 'App\Http\Controllers\AdminController@blokkeer')->middleware(['auth', 'blocked', 'admin']);

Route::get('/blocked', 'App\Http\Controllers\BlockController@show');

// });



require __DIR__.'/auth.php';






