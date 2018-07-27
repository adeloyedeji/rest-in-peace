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
Route::get('/admin/user','UserController@index')->name('admin.user');

Route::post('/admin/user', 'UserController@create')->name('admin.create');

Route::get('/admin/role','RoleController@index')->name('admin.role');

Route::post('/admin/role','RoleController@create');

Route::get('/admin/user/{id}/delete','UserController@delete');

Route::get('/admin/user/{id}','UserController@show');

Route::post('/admin/user/{id}/edit','UserController@edit');

Route::get('/admin/role/{id}','RoleController@delete');

Route::get('/admin/user/status/{id}','UserController@status');

//////////////////End ACL Route////////////////////////
Route::get('/utilities/get-dependents/{bid}', 'UtilityController@getDependents');
Route::post('/utilities/save-dependent', 'UtilityController@saveDependents');

Route::get('structure-valuations/index', [
    'uses'  =>  'StructureValuationController@index',
    'as'    =>  'structure-valuations.index'
]);
Route::get('structure-valuations/projects/index', [
    'uses'  =>  'StructureValuationController@projectsIndex',
    'as'    =>  'structure-valuations.projects.index'
]);
Route::post('structure-valuations/projects/save', [
    'uses'  =>  'StructureValuationController@projectStore',
    'as'    =>  'structure-valuations.project.store'
]);
Route::get('structure-valuations/projects/{id}', [
    'uses'  =>  'StructureValuationController@projectShow',
    'as'    =>  'structure-valuations.projects.show'
]);
Route::get('structure-valuations/beneficiaries/index', [
    'uses'  =>  'StructureValuationController@beneficiariesIndex',
    'as'    =>  'structure-valuations.beneficiaries.index'
]);
Route::get('structure-valuations/valuations/index', [
    'uses'  =>  'StructureValuationController@valuationsIndex',
    'as'    =>  'structure-valuations.valuations.index'
]);
Route::get('/projects/get-projects', [
    'uses'  =>  'ProjectController@getProjects',
    'as'    =>  'projects.index'
]);
Route::get('/projects/search/{query}', [
    'uses'  =>  'ProjectController@searchProjects',
    'as'    =>  'projects.search'
]);
Route::get('/projects/search-beneficiaries-by-project/{id}/{query}', [
    'uses'  =>  'ProjectController@searchBenByProject',
    'as'    =>  'projects.beneficiaries.search'
]);
Route::get('/projects/get-beneficiaries-by-project/{pid}', [
    'uses'  =>  'ProjectController@getProjectBen',
    'as'    =>  'projects.beneficiaries.index'
]);
Route::get('/utilities/get-projects-stats-data/{period}', [
    'uses'  =>  'UtilityController@getProjectStatsData',
    'as'    =>  'stats.get.data'
]);
Route::get('/reports/get-beneficiaries-in-states', [
    'uses'  =>  'ReportController@benStates',
    'as'    =>  'reports.beneficiaries.instates'
]);
Route::get('/reports/get-beneficiaries-by-size/{year}', [
    'uses'  =>  'ReportController@benBySizeData',
    'as'    =>  'reports.beneficiaries.bysize'
]);
Route::get('/reports/beneficiaries/download', [
    'uses'  =>  'ReportController@downloadBeneficiaries',
    'as'    =>  'reports.beneficiaries.download'
]);
Route::get('/reports/projects/download', [
    'uses'  =>  'ReportController@downloadProjects',
    'as'    =>  'reports.projects.download'
]);
Route::get('/reports/admins/download', [
    'uses'  =>  'ReportController@downloadAdmins',
    'as'    =>  'reports.admins.download'
]);
Route::get('/reports/projects-status/download', [
    'uses'  =>  'ReportController@downloadProjectStatus',
    'as'    =>  'reports.projects.status.download'
]);

Route::resource('projects', 'ProjectController');
Route::resource('beneficiaries', 'BeneficiaryController');
Route::resource('structure-valuations', 'StructureValuationController');
Route::resource('crops-trees-valuation', 'CropTreeValuationController');
Route::resource('reports', 'ReportController');
Route::resource('audit-trails', 'AuditTrailController');