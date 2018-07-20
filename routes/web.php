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
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

///////////////////Acl Route////////////////////////////
Route::get('/admin/user','UserController@index')->name('user');

Route::post('/admin/user', 'UserController@create');

Route::get('/admin/role','RoleController@index')->name('admin.role');

Route::post('/admin/role','RoleController@create');

Route::get('/admin/user/{id}','UserController@delete');

Route::get('/admin/role/{id}','RoleController@delete');

Route::get('/admin/user/status/{id}','UserController@status');

//////////////////End ACL Route////////////////////////
