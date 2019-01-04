<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/project/{id}', 'ProjectController@get')->name('project');
Route::get('/project/{id}/customers', 'ProjectController@customers')->name('customers');
Route::get('/customer/{id}/report', 'CustomerController@report')->name('customer');
Route::get('/logs', 'ActivityController@getAll')->name('logs');
Route::get('/metrics/purchases', 'MetricsController@purchases')->name('purchase-metrics');
Route::post('/project/purchase', 'ProjectController@purchase')->name('add-purchase');
Route::post('/customer/add', 'CustomerController@add')->name('add-customer');
Route::post('/customer/delete', 'CustomerController@delete')->name('delete-customer');
Route::post('/project/delete', 'ProjectController@destroy')->name('delete-purchase');