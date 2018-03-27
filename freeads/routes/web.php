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
    Route::get('annonce/index', 'AnnonceController@index')->name('annonce/index');
    Route::post('annonce/create','AnnonceController@create')->name('annonce/create');

});

