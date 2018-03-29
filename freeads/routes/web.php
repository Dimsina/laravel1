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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/index', 'IndexController@show')->name('/index');
Route::get('/home', 'IndexController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::post('/destroy', 'UserController@destroy')->name('destroy');
    Route::get('/edit', 'UserController@edit')->name('edit');
    Route::get('/annonce', 'AnnonceController@index')->name('annonce');
    Route::get('/annonce/create','AnnonceController@create')->name('annonce/create');
    Route::post('/annonce/store', 'AnnonceController@store')->name('annonce/store');
    Route::put('/annonce/{id}/update', 'AnnonceController@update')->name('annonce/{id}/update');
    Route::get('/annonce/destroy', 'AnnonceController@destroy')->name('annonce/destroy');
    Route::get('/annonce-id/show/{id}', 'AnnonceController@show')->name('annonce-id/show/{id}');


   /* Route::resource('annonce', 'AnnonceController', [
        'only' => ['create', 'store', 'destroy']
    ]);*/

});

