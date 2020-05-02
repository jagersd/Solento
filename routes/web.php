<?php

use Illuminate\Support\Facades\Route;

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
/*
|
|After Login routes
|
*/
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'User_racesController@index');
Route::post('/home','User_racesController@create');



/*
|
|View your profile
|
*/

Route::get('/profile', 'ProfilesController@index');
Route::post('/profile', 'ProfilesController@reset_account');

/*
|
|View your unit store
|
*/

Route::get('/unit_store', 'Unit_storeController@index');
Route::get('/units/{unit_id}', 'Unit_storeController@unit_index');

Route::post('/unit_store', 'Unit_storeController@buy_unit');
