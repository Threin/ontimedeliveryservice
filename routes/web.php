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

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/home',[
//     'uses'=>'HomeController@Index',
//     'as'=>'home',
//     'middleware'=> 'user'
// ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UsersController');
    Route::resource('/riders','RidersController');



    Route::get('/dashboard','AdminController@index')->name('dashboard');


});

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){


// });
Route::get('/permits','PermitsController@index')->name('permits');
Route::post('/permits/select-permits','PermitsController@selectedPermitsForPrinting')->name('permits.select_for_printing');
Route::get('/permits/for-printing','PermitsController@getAllForPrinting')->name('permits.for-printing');
Route::get('/permits/list-printed','PermitsController@getAllPrinted')->name('permits.printed');
Route::get('/permits/list-in-transit','PermitsController@getAllInTransit')->name('permits.in-transit');
Route::get('/permits/list-delivered','PermitsController@getAllDelivered')->name('permits.delivered');

Route::post('/permits/remove-for-printing/{permitId}','PermitsController@removePermitForPrinting')->name('permits.remove-for-printing');
Route::post('/permits/mark-printed/','PermitsController@markPermitPrinted')->name('permits.mark-as-printed');
Route::get('/permits/prntpreview/','PermitsController@printPreview')->name('permits.printPreview');
Route::get('/permits/prntpreview/{id}','PermitsController@printPreviewById')->name('permits.solo-printPreview');

