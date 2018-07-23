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


/*Route::get('/', function () {
    return view('welcome');

Route::get('/', function () {
    return view('auth.login');
});
*/
Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::resource('projects', 'ProjectController');
Route::resource('beneficiaries', 'BeneficiaryController');
Route::resource('structure-valuations', 'StructureValuationController');
Route::resource('crops-trees-valuation', 'CropTreeValuationController');
Route::resource('reports', 'ReportController');
Route::resource('audit-trails', 'AuditTrailController');

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


///////////////////Acl Route////////////////////////////
Route::get('/admin/user','UserController@index')->name('user');

Route::post('/admin/user', 'UserController@create');

Route::get('/admin/role','RoleController@index')->name('admin.role');

Route::post('/admin/role','RoleController@create');

Route::get('/admin/user/{id}','UserController@delete');

Route::get('/admin/role/{id}','RoleController@delete');

Route::get('/admin/user/status/{id}','UserController@status');

//////////////////End ACL Route////////////////////////
Route::get('/utilities/get-dependents/{bid}', 'UtilityController@getDependents');
Route::post('/utilities/save-dependent', 'UtilityController@saveDependents');