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

Route::resource('projects', 'ProjectController');
Route::resource('beneficiaries', 'BeneficiaryController');

Route::get('/projects/find/{id}', 'ProjectController@find');
Route::post('/projects/save', 'ProjectController@save');
Route::post('/projects/update', 'ProjectController@updateProject');
Route::post('/projects/delete', 'ProjectController@delete');
Route::post('/projects/status', 'ProjectController@updateStatus');


Route::get('/utilities/get-occupation', 'UtilityController@getOccupation');
Route::post('/utilities/save-occupation', 'UtilityController@setOccupation');
Route::get('/utilities/get-state', 'UtilityController@getStates');
Route::get('/utilities/get-lga/{sid}', 'UtilityController@getLga');

Route::get('/utilities/get-lga', function() {
    return response()->json(\App\Lga::where('state_id', 15)->get());
});