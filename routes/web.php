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

Route::post('/enviar', 'ContactoController@enviar')->name('enviar');
Route::post('/email', 'CorreoController@store');

Auth::routes();

Route::prefix('adm/')->group(function(){

	Route::get('admin/register', 'AdminController@create')->name('admin.register');
	Route::post('admin/register', 'AdminController@store')->name('admin.register.store');
	Route::get('/', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
	
	Route::get('/home', 'HomeController@index')->name('home');

});

