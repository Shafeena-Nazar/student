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


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () { 
	Route::get('/admin/home', 'HomeController@index')->name('home');
	
	Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/admin/new-student', 'HomeController@newStudent')->name('addNewStudent');
	Route::post('/admin/new-student', 'HomeController@newStudent')->name('addNewStudent');

	Route::get('/admin/edit-student/{id}', 'HomeController@editStudent')->name('editStudent');

	Route::get('/admin/update-student', 'HomeController@updateStudent')->name('updateNewStudent');
	Route::post('/admin/update-student', 'HomeController@updateStudent')->name('updateNewStudent');

	Route::post('/admin/ajax/delete-data', 'HomeController@delete_data')->name('delete_data');

	Route::get('/admin/student-marks', 'HomeController@studentMarks')->name('studentMarks');
	Route::get('/admin/add-marks', 'HomeController@addNewMark')->name('addNewMark');
	Route::post('/admin/add-marks', 'HomeController@addNewMark')->name('addNewMark');

	Route::get('/admin/edit-mark/{id}', 'HomeController@editMark')->name('editMark');

	Route::get('/admin/update-mark', 'HomeController@updateMark')->name('updateMark');
	Route::post('/admin/update-mark', 'HomeController@updateMark')->name('updateMark');

});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('view:cache');
});
