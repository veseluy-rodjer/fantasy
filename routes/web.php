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

Auth::routes(['verify' => true]);

Route::get('/login', function() {
	return abort(404);
})->name('login');

Route::get('/register', function() {
	return abort(404);
})->name('register');

Route::get('/password/reset', function() {
	return abort(404);
})->name('password.request');

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('admin', 'admin/tests');

Route::delete('admin/tests/arr-delete', 'Admin\TestController@arrDelete')->name('tests.arrDelete');
Route::resource('admin/tests', 'Admin\TestController');

Route::get('/', 'MainController@main')->name('main');

Route::delete('opuses/arr-delete', 'OpusController@arrDelete')->name('opuses.arrDelete');
Route::resource('opuses', 'OpusController');
