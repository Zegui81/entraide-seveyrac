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

// Evènements
Route::get('event', 'EventController@home');
Route::get('event/calendar', 'EventController@calendar');
Route::get('event/detail/{id}', 'EventController@detail');

/* ADMINISTRATION ---------------------------------------------------------- */
// Menu administraion
Route::get('admin', 'Admin\AdminController@index'); 

// Demandes d'admission
Route::get('admin/membership', 'Admin\AdminUserController@membership');
Route::patch('admin/membership/{id}', 'Admin\AdminUserController@confirm');
Route::delete('admin/membership/{id}', 'Admin\AdminUserController@reject');

// Liste des adhérents
Route::get('admin/user', 'Admin\AdminUserController@user');
Route::delete('admin/user/{id}', 'Admin\AdminUserController@delete');

Route::get('admin/user/add', 'Admin\AdminUserController@register');
Route::post('admin/user/add', 'Admin\AdminUserController@addUser');

/* ------------------------------------------------------------------------- */

Route::get('contact', 'FirstController@getFormContact');
Route::post('contact', 'FirstController@postFormContact');

Auth::routes();