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

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'ReportController@index')->name('home');
// Route::get('/', function() {
// 	dd(bcrypt('Dollar@2018.'));
// });
// Route::get('/', function() {
//     return response()->json(strtolower(Auth::User()->role->slug));
// });

Route::prefix('projects')->group(function() {
    Route::get('get-projects', 'ProjectController@getProjects')->name('projects.index');
    Route::get('search/{query}', 'ProjectController@searchProjects')->name('projects.search');
    Route::get('search-beneficiaries-by-project/{id}/{query}', 'ProjectController@searchBenByProject')->name('projects.beneficiaries.search');
    Route::get('get-beneficiaries-by-project/{pid}', 'ProjectController@getProjectBen')->name('projects.beneficiaries.index');
    Route::get('find/{id}', 'ProjectController@find');
    Route::get('{id}', 'ProjectController@show')->name('projects.show');
    Route::post('save', 'ProjectController@save');
    Route::post('update', 'ProjectController@updateProject');
    Route::post('delete', 'ProjectController@delete');
    Route::post('status', 'ProjectController@updateStatus');
    Route::post('add-beneficiary', 'ProjectController@addBeneficiary')->name('project.add-beneficiary');
    Route::get('beneficiary-projects/{id}', 'ProjectController@beneficiaryProjects')->name('beneficiary-projects');
    Route::get('beneficiary-properties/{id}/{type}', 'ProjectController@beneficiary_properties');
});


Route::prefix('utilities')->group(function() {
    Route::get('get-occupation', 'UtilityController@getOccupation');
    Route::post('save-occupation', 'UtilityController@setOccupation');
    Route::get('get-state', 'UtilityController@getStates');
    Route::get('get-lga/{sid}', 'UtilityController@getLga');
    Route::get('get-lga', function() {
        return response()->json(\App\Lga::where('state_id', 15)->get());
    });
    Route::get('get-dependents/{bid}', 'UtilityController@getDependents');
    Route::post('save-dependent', 'UtilityController@saveDependents');
    Route::get('get-projects-stats-data/{period}', 'UtilityController@getProjectStatsData')->name('stats.get.data');
    Route::get('get-crops', 'UtilityController@getCrops')->name('crops.all');
    Route::get('get-crops-list', 'UtilityController@getCropsList')->name('crops.name');
    Route::get('get-crops-distinct-name', 'UtilityController@getDistinctCropName')->name('crops.name.distinct');
});


///////////////////Acl Route////////////////////////////
Route::prefix('admin')->group(function() {
    Route::get('roles', 'RoleController@roles')->name('admin.roles');
    Route::post('roles', 'RoleController@store')->name('admin.role.save');
    Route::post('role','RoleController@create')->name('admin.role.store');
    Route::get('role/{id}','RoleController@show')->name('admin.role');
    Route::put('role/{id}', 'RoleController@update')->name('admin.role.update');
    Route::delete('role/{id}','RoleController@delete')->name('admin.role.show');
    Route::delete('roles/role/{id}', 'RoleController@destroy')->name('admin.role.destroy');

    Route::get('user','UserController@index')->name('admin.user');
    Route::post('user', 'UserController@create')->name('admin.create');
    Route::get('user/{id}','UserController@show')->name('admin.user.show');
    Route::post('user/{id}/edit','UserController@edit')->name('admin.user.edit');
    Route::get('user/{id}/delete','UserController@delete')->name('admin.user.delete');
    Route::delete('user/{id}', 'UserController@destroy')->name('admin.user.destroy');
    Route::get('user/status/{id}','UserController@status')->name('admin.user.status');
});

//////////////////End ACL Route////////////////////////

Route::prefix('structure-valuations')->group(function() {
    // Route::get('index', 'StructureValuationController@index')->name('structure-valuations.index');
    Route::get('projects/index', 'StructureValuationController@projectsIndex')->name('structure-valuations.projects.index');
    Route::post('projects/save', 'StructureValuationController@projectStore')->name('structure-valuations.project.store');
    Route::get('projects/{id}', 'StructureValuationController@projectShow')->name('structure-valuations.projects.show');
    Route::get('beneficiaries/index', 'StructureValuationController@beneficiariesIndex')->name('structure-valuations.beneficiaries.index');
    Route::get('valuations/index', 'StructureValuationController@valuationsIndex')->name('structure-valuations.valuations.index');
});
Route::prefix('faces')->group(function() {
    Route::post('search', 'FaceController@search')->name('face.search');
});

Route::prefix('reports')->group(function() {
    Route::get('get-beneficiaries-in-states', 'ReportController@benStates')->name('reports.beneficiaries.instates');
    Route::get('get-beneficiaries-by-size/{year}', 'ReportController@benBySizeData')->name('reports.beneficiaries.bysize');
    Route::get('beneficiaries/download', 'ReportController@downloadBeneficiaries')->name('reports.beneficiaries.download');
    Route::get('projects/download', 'ReportController@downloadProjects')->name('reports.projects.download');
    Route::get('admins/download', 'ReportController@downloadAdmins')->name('reports.admins.download');
    Route::get('projects-status/download', 'ReportController@downloadProjectStatus')->name('reports.projects.status.download');
});


Route::get('/beneficiaries/finger-print-upload/{id}', 'BeneficiaryController@fingerPrintUpload')->name('beneficiaries.finger-print-upload');
Route::post('/beneficiaries/finger-print/store', 'BeneficiaryController@fingerPrintStore')->name('beneficiaries.finger-print.store');
Route::get('/beneficiaries/verify-finger-print/{id}', 'BeneficiaryController@fingerPrintVerify')->name('beneficiaries.finger-print.verify');
Route::get('/beneficiaries/search', 'BeneficiaryController@search')->name('beneficiaries.search');
Route::post('/beneficiaries/search', 'BeneficiaryController@faceSearch')->name('beneficiaries.search.face');
Route::get('/beneficiaries/search/text/{needle}', 'BeneficiaryController@textSearch')->name('beneficiaries.search.text');

Route::get('/beneficiaries/create/planning', 'BeneficiaryController@planningForm')->name('beneficiaries.create.planning');
Route::get('/beneficiaries/create/structure', 'BeneficiaryController@structureForm')->name('beneficiaries.create.structure');
Route::get('/beneficiaries/create/crops-and-economic-trees', 'BeneficiaryController@cetForm')->name('beneficiaries.create.crops-and-economic-trees');
Route::get('/beneficiaries/create/monitoring-and-control', 'BeneficiaryController@mcForm')->name('beneficiaries.create.monitoring-and-control');

Route::get('/beneficiaries/properties/stucture/add/{bid}/{project_id}/{prop_id}', 'FCDAStructureController@captureAnotherProperty')->name('beneficiaries.properties.structure.add');

Route::post('/beneficiaries/create/structure', 'FCDABeneficiaryController@structureBeneficiaryStore')->name('fcda-beneficiaries.structure.store');
Route::prefix('structures')->group(function() {
    Route::get('capture/{bid}/{ppid}/{sid}', 'FCDAStructureController@capture')->name('structures.capture');
    Route::post('store', 'FCDAStructureController@store');
    Route::post('store-sub', 'FCDAStructureController@storeSub')->name('structures.store-sub');
    Route::post('finalize', 'FCDAStructureController@finalizeProperty');
    Route::get('beneficiaries/{id}/{property_id}/{sid}', 'FCDABeneficiaryController@beneficiaries');
    Route::post('pre-add-more', 'FCDAStructureController@preAddMore')->name('structures.add-more');
    Route::post('store-another-property', 'FCDAStructureController@storeAnotherProperty')->name('structures.store-another-property');
});
Route::prefix('planning')->group(function() {
    Route::post('store', 'FCDAPlanningController@store')->name('planning.store');
    Route::get('beneficiaries/{bid}/{pid}', 'FCDAPlanningController@show')->name('planning.beneficiary');
    Route::get('beneficiaries', 'FCDAPlanningController@index')->name('planning.beneficiaries');
    Route::put('beneficiaries/update', 'FCDAPlanningController@update')->name('planning.update');
    Route::delete('beneficiaries/delete/{id}', 'FCDAPlanningController@destroy')->name('planning.delete');
});
Route::prefix('monitoring-and-control')->group(function() {
    Route::get('beneficiaries', 'MCController@index')->name('monitoring-and-control.beneficiaries');
    Route::post('store', 'MCController@store')->name('monitoring-and-control.store');
    Route::get('beneficiaries/{bid}/{pid}', 'MCController@show')->name('monitoring-and-control.beneficiary');
    Route::get('beneficiaries/edit/{bid}/{mc_id}', 'MCController@edit')->name('monitoring-and-control.edit');
    Route::put('beneficiaries/update', 'MCController@update')->name('monitoring-and-control.update');
    Route::delete('beneficiaries/delete/{id}', 'MCController@destroy')->name('monitoring-and-control.beneficiaries.delete');
});
Route::prefix('fcda')->group(function() {
    Route::get('beneficiaries', 'FCDAController@beneficiaries')->name('fcda.beneficiaries');
});

Route::get('/crops-trees-valuation/valuations', 'CropTreeValuationController@valuations')->name('crops-trees-valuation/valuations');
Route::get('/crop-valuation-test/{project_id}', 'CropTreeValuationController@getTotalValuation');
Route::get('/crops-trees-general/download/{project_id}', 'CropTreeValuationController@downloadCropReport')->name('crops-trees-valuation.download');
Route::get('/structures-valuations-test/{project_id}', 'StructureValuationController@getBeneficiaryStructureValuation');
Route::get('/structures-general/download/{project_id}', 'StructureValuationController@downloadStructureReport')->name('structures-valuation.download');
Route::get('/structure-valuations/valuations', 'StructureValuationController@valuations')->name('structures-valuation.valuations');

Route::resource('projects', 'ProjectController');
Route::resource('beneficiaries', 'BeneficiaryController');
Route::resource('structure-valuations', 'StructureValuationController');
Route::resource('crops-trees-valuation', 'CropTreeValuationController');
Route::resource('reports', 'ReportController');
Route::resource('audit-trails', 'AuditTrailController');
Route::resource('pricing', 'PriceController');

Route::prefix('properties')->group(function() {
    Route::get('index/{id}', 'PropertyController@index')->name('properties.index');
    Route::get('create/{id}', 'PropertyController@propertyCreate')->name('properties.create.index');
    Route::post('store', 'PropertyController@propertyStore')->name('properties.store');
    Route::get('destroy/{property_id}', 'PropertyController@destroyProperty')->name('beneficiaries.properties.destroy');
    Route::get('structure/index/{id}/{property_id}', 'PropertyController@structureIndex')->name('properties.structure.index');
    Route::post('structure/store', 'PropertyController@structureStore')->name('properties.structure.store');
    Route::get('structure/property/{id}', 'PropertyController@getStructureProperty')->name('properties.structure.get');
    Route::put('structure/evaluate', 'PropertyController@evaluateStructureProperty')->name('properties.structure.evaulate');
    Route::get('crops-economic-trees/index/{id}/{property_id}', 'PropertyController@cropIndex')->name('properties.crops.index');
    Route::post('crops-and-economic-trees/store/item', 'PropertyController@cropTreeStoreItem')->name('properties.crops-and-economic-trees.store.item');
    Route::get('crops-and-economic-trees/item/{beneficiaryID}/{propertyID}', 'PropertyController@cropTreeGetItem')->name('properties.crops-and-economic-trees.get.item');
    Route::post('crops-and-economic-trees/store', 'PropertyController@cropTreeStore')->name('properties.crops-and-economic-trees.store');
});

Route::prefix('profiles')->group(function() {
    Route::get('me', 'ProfileController@me')->name('profiles.me');
    Route::post('store', 'ProfileController@store')->name('profiles.store');
});

Route::get('total_valuations/{id}', 'CropTreeValuationController@getTotalValuation');