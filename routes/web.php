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

//User activation routes
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');

//Property data retrival when creating a contract
Route::get('/findPrice','ContractsController@findPrice');
Route::get('/findType','ContractsController@findType');
Route::get('/findCondition','ContractsController@findCondition');
Route::get('/findLandline','ContractsController@findLandline');
Route::get('/findBeds','ContractsController@findBeds');
Route::get('/findBaths','ContractsController@findBaths');
Route::get('/findKitchens','ContractsController@findKitchens');
Route::get('/findCity','ContractsController@findCity');
Route::get('/findCountry','ContractsController@findCountry');
Route::get('/findRegion','ContractsController@findRegion');
Route::get('/findUpdated','ContractsController@findUpdated');


Route::middleware(['auth'])->group(function () {

  Route::resource('properties', 'PropertiesController');
  Route::resource('users', 'UsersController');
  Route::post('users', 'UsersController@update_avatar');
  Route::get('contracts/create/{property_id?}', 'ContractsController@create');
  Route::resource('contracts', 'ContractsController');

});
