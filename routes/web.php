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

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@show')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/addHuisdier', 'App\Http\Controllers\AddHuisdierController@addHuisdier');

Route::post('/addAanvraag', 'App\Http\Controllers\AanvraagController@addAanvraag');
Route::get('/aanvraag-details/{id}/', 'App\Http\Controllers\AanvraagController@show');


Route::get('/addReactie/{id}', 'App\Http\Controllers\ReactieController@show');
Route::post('/addReactie/{id}/aanmaken', 'App\Http\Controllers\ReactieController@addReactie');
Route::post('/reageer/{id}', 'App\Http\Controllers\ReactieController@Reageer');

Route::get('/admin', 'App\Http\Controllers\AdminController@Show');
Route::get('/admin/{id}/verwijder', 'App\Http\Controllers\AdminController@verwijder');
Route::get('/admin/{email}/blokkeer', 'App\Http\Controllers\AdminController@blokkeer');









