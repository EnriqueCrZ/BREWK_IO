<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
        return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account/municipio','AccountController@municipio')->name('municipio');
Route::post('/account/new','AccountController@guardar_cuenta_nueva')->name('new.account');

Route::get('/admin/settings','AccountController@show_profile')->name('show.profile');
Route::get('/brewk/viajes','Viajes@showView')->name('reservar');
Route::get('/brewk/viajse/itinerario','Viajes@getItinerario')->name('reservar.itinerario');
Route::get('/brewk/viajse/precio','Viajes@getPrecio')->name('reservar.precio');

Route::post('/brewk/viaje/guardar','Viajes@store')->name('reservar.guardar');

Route::get('/brewk/viajes/facturados','Viajes@viajes')->name('viajes');
