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
use Illuminate\Support\Facades\Route;

Auth::routes();

// Quicky Routes

Route::any('/admin', 'AdminController@index')->name('admin.admin')->middleware('check-perm');


Route::any('/', 'HomeController@index')->name('home');
Route::any('/about', 'HomeController@about')->name('about');
Route::any('/booking', 'HomeController@booking')->name('booking');
Route::any('/contact', 'HomeController@contact')->name('contact');
Route::any('/services', 'HomeController@service')->name('services');
Route::any('/testimonials', 'HomeController@testimonials')->name('testimonials');

Route::any('/dashboard', 'AdminController@index')->name('admin')->middleware('check-perm');

//
Route::resource('user', 'UserController')->except(['show']);
Route::any('user/profil', 'UserController@myProfil')->name('user.profil');
Route::get('user/data', 'UserController@data')->name('user.data');

// role
Route::any('/role/list', 'RoleController@list')->name('role_list');
Route::any('/role/create', 'RoleController@create')->name('role_create')->middleware('check-perm');
Route::any('/role/update/{role}', 'RoleController@update')->name('role_update');
Route::any('/role/delete/{role}', 'RoleController@delete')->name('role_delete');

// ressource
Route::any('/ressource/list', 'RessourceController@list')->name('ressource_list');
Route::any('/ressource/create', 'RessourceController@create')->name('ressource_create');
Route::any('/ressource/update/{ressource}', 'RessourceController@update')->name('ressource_update');
Route::any('/ressource/delete/{ressource}', 'RessourceController@delete')->name('ressource_delete');

// fonctionnalite
Route::any('/fonctionnalite/list', 'FonctionnaliteController@list')->name('fonctionnalite_list');
Route::any('/fonctionnalite/create', 'FonctionnaliteController@create')->name('fonctionnalite_create');
Route::any('/fonctionnalite/update/{fonctionnalite}', 'FonctionnaliteController@update')->name('fonctionnalite_update');
Route::any('/fonctionnalite/delete/{fonctionnalite}', 'FonctionnaliteController@delete')->name('fonctionnalite_delete');

// apparence
Route::any('/apparence/list', 'ApparenceController@list')->name('apparence_list');
Route::any('/apparence/create', 'ApparenceController@create')->name('apparence_create');
Route::any('/apparence/update/{apparence}', 'ApparenceController@update')->name('apparence_update');
Route::any('/apparence/delete/{apparence}', 'ApparenceController@delete')->name('apparence_delete');

// quickyproject
Route::resource('quickyproject', 'QuickyprojectController')->except(['show']);
Route::get('quickyproject/data', 'QuickyprojectController@data')->name('quickyproject.data');

// menu
Route::any('/menu/list', 'MenuController@list')->name('menu_list');
Route::any('/menu/create', 'MenuController@create')->name('menu_create');
Route::any('/menu/update/{menu}', 'MenuController@update')->name('menu_update');
Route::any('/menu/delete/{menu}', 'MenuController@delete')->name('menu_delete');
Route::post('/menu/updateOrder', 'MenuController@updateOrder')->name('update_menus_drag');

// permission
Route::resource('permission', 'PermissionController')->except(['show']);
Route::get('permission/data', 'PermissionController@data')->name('permission.data');
Route::post('/permissions/refresh', 'PermissionController@refresh')->name('permissions.refresh');

// rolepermission
Route::resource('rolepermission', 'RolepermissionController')->except(['show']);
Route::get('rolepermission/data', 'RolepermissionController@data')->name('rolepermission.data');

// company
Route::resource('company', 'CompanyController')->except(['show']);
Route::get('company/data', 'CompanyController@data')->name('company.data');

Route::get('/check-new-notification/{type}', 'NotificationController@checkNewNotification')->name('check_Notification');



// position
Route::resource('position', 'PositionController')->except(['show']);
Route::get('position/data', 'PositionController@data')->name('position.data');

// speciality
Route::resource('speciality', 'SpecialityController')->except(['show']);
Route::get('speciality/data', 'SpecialityController@data')->name('speciality.data');

// employee
Route::resource('employee', 'EmployeeController')->except(['show']);
Route::get('employee/data', 'EmployeeController@data')->name('employee.data');

// reservation
Route::resource('reservation', 'ReservationController')->except(['show']);
Route::get('reservation/data', 'ReservationController@data')->name('reservation.data');
Route::get('/calender', 'ReservationController@calender')->name('calender');
Route::get('/reservation/create/client/{id}','ReservationController@createReservationClient')->name('create_reservation_client');
Route::post('/reservation/client/create','ReservationController@ReservationClientCreate')->name('reservation_client_create');
Route::get('/reservation/getClientDetails', 'ReservationController@getClientDetails')->name('get_Client_Details');
// client
Route::resource('client', 'ClientController')->except(['show']);
Route::get('client/data', 'ClientController@data')->name('client.data');


// notification
Route::resource('notification', 'NotificationController')->except(['show']);
Route::get('notification/data', 'NotificationController@data')->name('notification.data');

// marque
Route::resource('marque', 'MarqueController')->except(['show']);
Route::get('marque/data', 'MarqueController@data')->name('marque.data');

// modele
Route::resource('modele', 'ModeleController')->except(['show']);
Route::get('modele/data', 'ModeleController@data')->name('modele.data');
Route::get('/getModelesByMarque/{marqueId}', 'ModeleController@getModelesByMarque');

// annee
Route::resource('annee', 'AnneeController')->except(['show']);
Route::get('annee/data', 'AnneeController@data')->name('annee.data');

// vehicule
Route::resource('vehicule', 'VehiculeController')->except(['show']);
Route::get('vehicule/data', 'VehiculeController@data')->name('vehicule.data');


// statut
Route::resource('statut', 'StatutController')->except(['show']);
Route::get('statut/data', 'StatutController@data')->name('statut.data');

// facture
Route::resource('facture', 'FactureController')->except(['show']);
Route::get('facture/data', 'FactureController@data')->name('facture.data');
Route::get('facture/edit/{id}', 'FactureController@editFacture')->name('facture_client.edit');
Route::post('facture/create/client', 'FactureController@createFacture')->name('facture_client.create');
// typeservice
Route::resource('typeservice', 'TypeserviceController')->except(['show']);
Route::get('typeservice/data', 'TypeserviceController@data')->name('typeservice.data');

// service
Route::resource('service', 'ServiceController')->except(['show']);
Route::get('service/data', 'ServiceController@data')->name('service.data');


// categorie
Route::resource('categorie', 'CategorieController')->except(['show']);
Route::get('categorie/data', 'CategorieController@data')->name('categorie.data');

// product
Route::resource('product', 'ProductController')->except(['show']);
Route::get('product/data', 'ProductController@data')->name('product.data');

// reception
Route::resource('reception', 'ReceptionController')->except(['show']);
Route::get('reception/data', 'ReceptionController@data')->name('reception.data');

// reception_product
Route::resource('reception_product', 'Reception_productController')->except(['show']);
Route::get('reception_product/data', 'Reception_productController@data')->name('reception_product.data');


// facture_article
Route::resource('facture_article', 'Facture_articleController')->except(['show']);
Route::get('facture_article/data', 'Facture_articleController@data')->name('facture_article.data');
