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

// Jobs
Route::get('/jobs/new', 'JobsController@new')->name('jobs.new');
Route::post('/jobs', 'JobsController@create')->name('jobs.create');
Route::get('/jobs', 'JobsController@index')->name('jobs');
Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('jobs.edit');
Route::post('/jobs/{id}', 'JobsController@update')->name('jobs.update');
Route::post('/jobs/{id}/delete', 'JobsController@destroy')->name('jobs.delete');
Route::get('/jobs/{id}', 'JobsController@show')->name('jobs.show');
Route::get('/mypage', 'JobsController@mypage')->name('jobs.mypage');
Route::get('/jobs/{id}/apply', 'JobsController@apply')->name('jobs.apply');
Route::post('/jobs/{id}/apply', 'JobsController@applied')->name('jobs.applied');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/jobs/new', 'JobsController@new')->name('jobs.new');
    Route::post('/jobs', 'JobsController@create')->name('jobs.create');
    Route::get('/jobs', 'JobsController@index')->name('jobs');
    Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('jobs.edit');
    Route::post('/jobs/{id}', 'JobsController@update')->name('jobs.update');
    Route::post('/jobs/{id}/delete', 'JobsController@destroy')->name('jobs.delete');
    Route::get('/jobs/{id}', 'JobsController@show')->name('jobs.show');
    Route::get('/mypage', 'JobsController@mypage')->name('jobs.mypage');
    Route::get('/jobs/{id}/apply', 'JobsController@apply')->name('jobs.apply');
    Route::post('/jobs/{id}/apply', 'JobsController@applied')->name('jobs.applied');
});