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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activity', 'ActivityController@index')->name('activity');
Route::get('/metrics', 'MetricController@index')->name('metrics');
Route::get('/project/{id}', 'HomeController@project')->name('project');
Route::get('/customer/{id}', 'CustomerController@customer')->name('customer');
Route::get('/activity', 'ActivityController@index')->name('activity');
Route::get('/metrics', 'MetricsController@index')->name('metrics');