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

// Ajouter un membre
Route::get('admin/user/add', 'Admin\AdminUserController@register');
Route::post('admin/user/add', 'Admin\AdminUserController@addUser');

// Carousel de photos
Route::get('admin/home/carousel', 'Admin\AdminHomeController@carousel');
Route::post('admin/home/carousel', 'Admin\AdminHomeController@addPicture');
Route::get('admin/home/carousel/{id}', 'Admin\AdminHomeController@removePicture');

// Texte d'accueil
Route::get('admin/home/text', 'Admin\AdminHomeController@text');
Route::post('admin/home/text', 'Admin\AdminHomeController@updateAccueil');

// Évènements
Route::get('admin/event', 'Admin\AdminEventController@events');
Route::get('admin/event/add', 'Admin\AdminEventController@createEvent');
Route::post('admin/event/add', 'Admin\AdminEventController@validateCreateEvent');
Route::get('admin/event/{id}', 'Admin\AdminEventController@editEvent');
Route::post('admin/event/{id}', 'Admin\AdminEventController@validateEditEvent');
Route::delete('admin/event/{id}', 'Admin\AdminEventController@deleteEvent');
Route::get('admin/event/gallery/{id}', 'Admin\AdminEventController@gallery');
Route::post('admin/event/gallery/{id}', 'Admin\AdminEventController@addPhoto');
Route::get('admin/event/gallery/{id}/{photo}', 'Admin\AdminEventController@deletePhoto');

/* ------------------------------------------------------------------------- */

Route::get('contact', 'FirstController@getFormContact');
Route::post('contact', 'FirstController@postFormContact');

Auth::routes();