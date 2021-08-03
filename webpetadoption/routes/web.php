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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pets', 'PetController@index')->name('pets-list');

Route::get('/pets/create', 'PetController@create')->name('create-pet');

Route::post('pets', 'PetController@store');

Route::get('pets/{pet}', 'PetController@show')->name('show-pet');

Route::get('pets/{pet}/pet', 'PetController@edit')->name('edit-pet');

Route::put('pets/{pet}', 'PetController@update');

Route::delete('pets/{pet}', 'PetController@destroy');

Route::get('/petfilter', 'PetController@filter')->name('pet-filter');

Route::post('/petsearch', 'PetController@search')->name('pet-search');

Route::get('/dogGraph', 'PetController@dogGraph')->name('dogGraph');

Route::get('/catGraph', 'PetController@catGraph')->name('catGraph');

Route::get('/canaryGraph', 'PetController@canaryGraph')->name('canaryGraph');

Route::get('/hamsterGraph', 'PetController@hamsterGraph')->name('hamsterGraph');

Route::get('/petsGraph', 'PetController@petsGraph')->name('petsGraph');

Route::get('/graphsMenu', 'PetController@graphsMenu')->name('graphsMenu');

Route::get('/contactus', 'MessageController@index')->name('dogsGraph');

Route::get('sendemail', 'MessageController@send')->name('sendemail');

Route::resource('/permissions', 'PermissionController');