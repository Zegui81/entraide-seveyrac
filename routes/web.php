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

Route::get('contact', 'HomeController@contact');
Route::post('contact', 'HomeController@createContact');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

/* PAGES ------------------------------------------------------------------- */
// Evènements
Route::get('event', 'EventController@home');
Route::get('event/calendar', 'EventController@calendar');
Route::get('event/detail/{id}', 'EventController@detail');

// Covoiturage
Route::get('covoit', 'Pages\CovoitController@home');
Route::get('covoit/search/{day}', 'Pages\CovoitController@search');
Route::get('covoit/calendar', 'Pages\CovoitController@calendar');

Route::get('covoit/manage', 'Pages\CovoitController@manage');
Route::post('covoit/manage', 'Pages\CovoitController@validateCreateCovoit');

Route::get('covoit/manage/{id}', 'Pages\CovoitController@editCovoit');
Route::patch('covoit/manage/{id}', 'Pages\CovoitController@validateEditCovoit');
Route::delete('covoit/manage/{id}', 'Pages\CovoitController@deleteCovoit');

// Transports solidaires
Route::get('transport', 'Pages\TransportSolidaireController@home');
Route::get('transport/search/{id}', 'Pages\TransportSolidaireController@search');

Route::get('transport/manage', 'Pages\TransportSolidaireController@manage');
Route::post('transport/manage', 'Pages\TransportSolidaireController@validateCreateTransport');

Route::get('transport/manage/{id}', 'Pages\TransportSolidaireController@editTransport');
Route::patch('transport/manage/{id}', 'Pages\TransportSolidaireController@validateEditTransport');
Route::delete('transport/manage/{id}', 'Pages\TransportSolidaireController@deleteTransport');

// Presse
Route::get('news', 'Pages\PresseController@articles');

/* ADMINISTRATION ---------------------------------------------------------- */
// Menu administraion
Route::get('admin', 'Admin\AdminController@index'); 

// Formulaire d'adhésion
Route::get('admin/user/form', 'Admin\AdminUserController@formMembership');
Route::post('admin/user/form', 'Admin\AdminUserController@editFormMembership');

// Contacts
Route::get('admin/contact', 'Admin\AdminHomeController@contacts');
Route::delete('admin/contact/{id}', 'Admin\AdminHomeController@deleteContact');

// Demandes d'admission
Route::get('admin/membership', 'Admin\AdminUserController@membership');
Route::patch('admin/membership/{id}', 'Admin\AdminUserController@confirmMembership');
Route::delete('admin/membership/{id}', 'Admin\AdminUserController@rejectMembership');

// Liste des adhérents
Route::get('admin/user', 'Admin\AdminUserController@user');

Route::get('admin/user/{id}', 'Admin\AdminUserController@editUser');
Route::patch('admin/user/{id}', 'Admin\AdminUserController@validateEditUser');
Route::get('admin/user/cotisation/{id}', 'Admin\AdminUserController@changeCotisation');

Route::patch('admin/user/upgrade/{id}', 'Admin\AdminUserController@upgrade');
Route::patch('admin/user/downgrade/{id}', 'Admin\AdminUserController@downgrade');

Route::delete('admin/user/{id}', 'Admin\AdminUserController@deleteUser');

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

// Footer
Route::get('admin/home/footer', 'Admin\AdminHomeController@footer');
Route::post('admin/home/footer', 'Admin\AdminHomeController@updateFooter');

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

// Covoiturages
Route::get('admin/covoit', 'Admin\AdminCovoitController@covoits');

Route::get('admin/covoit/publish', 'Admin\AdminCovoitController@createCovoit');
Route::post('admin/covoit/publish', 'Admin\AdminCovoitController@validateCreateCovoit');

Route::get('admin/covoit/{id}', 'Admin\AdminCovoitController@editCovoit');
Route::patch('admin/covoit/{id}', 'Admin\AdminCovoitController@validateEditCovoit');
Route::delete('admin/covoit/{id}', 'Admin\AdminCovoitController@deleteCovoit');

// Transports solidaires
Route::get('admin/transport', 'Admin\AdminTransportSolidaireController@transports');

Route::get('admin/transport/publish', 'Admin\AdminTransportSolidaireController@createTransport');
Route::post('admin/transport/publish', 'Admin\AdminTransportSolidaireController@validateCreateTransport');

Route::get('admin/transport/{id}', 'Admin\AdminTransportSolidaireController@editTransport');
Route::patch('admin/transport/{id}', 'Admin\AdminTransportSolidaireController@validateEditTransport');
Route::delete('admin/transport/{id}', 'Admin\AdminTransportSolidaireController@deleteTransport');

// Presse
Route::get('admin/news', 'Admin\AdminPresseController@articles');
Route::post('admin/news', 'Admin\AdminPresseController@publish');
Route::get('admin/news/{id}', 'Admin\AdminPresseController@deleteArticle');

/* ------------------------------------------------------------------------- */

Auth::routes();