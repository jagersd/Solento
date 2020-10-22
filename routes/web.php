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
|Store routes
|
*/

Route::get('/unit_store', 'Unit_storeController@index');
Route::post('/unit_store', 'Unit_storeController@buy_unit');
Route::get('/units/{unit_id}', 'Unit_storeController@unit_index');

Route::get('/item_store', 'Item_storeController@index');
Route::post('/item_store', 'Item_storeController@buy_item');
Route::get('/items/{item_id}', 'Item_storeController@item_index');

/*
|
|Outfit routes
|
*/

Route::get('/outfit','OutfitsController@index');
Route::get('/outfit/details/{id}','OutfitsController@detailindex');
Route::post('/outfit','OutfitsController@namechange');
Route::post('/outfit/details/','OutfitsController@equipItems');
Route::post('/outfit/details/unequip','OutfitsController@unequipItems');
Route::post('/outfit/details/sell_unit','OutfitsController@sell_unit');
Route::post('/outfit/details/position','OutfitsController@editPosition');

/*
|
|Battle routes
|
*/

Route::get('/battle/prepare', 'BattlesController@index');
Route::post('/battle/field/', 'BattlesController@create_or_update');
Route::get('/battle/field/{battlecode}', 'BattlesController@battle');
Route::get('/battle/sequence/{battlecode}', 'BattlesController@sequence');
Route::get('/battle/complete/{complete_code}', 'BattlesController@complete_sequence');

/*
|
|Static pages
|
*/

Route::view('/statics/world','statics.placeholder');
Route::view('/statics/factions','statics.placeholder');
Route::view('/statics/frontlines','statics.placeholder');
Route::view('/statics/rules','statics.placeholder');
