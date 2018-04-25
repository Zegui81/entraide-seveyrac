<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Accueil
Route::get('/', 'HomeController@index');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

Route::get('event', 'EventController@home');
Route::get('event/calendar', 'EventController@calendar');
Route::get('event/detail/{id}', 'EventController@detail');


Route::get('contact', 'FirstController@getFormContact');
Route::post('contact', 'FirstController@postFormContact');

Auth::routes();