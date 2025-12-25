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

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/

Route::group(['namespace' => '\Modules\Transparansi\Http\Controllers\Frontend', 'as' => 'frontend.', 'middleware' => 'web'], function () {
    $module_name = 'transparansi';
    $controller_name = 'TransparansiController';

    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/{slug}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
});

/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => '\Modules\Transparansi\Http\Controllers\Backend', 'as' => 'backend.', 'middleware' => ['web', 'auth', 'can:view_backend'], 'prefix' => 'admin'], function () {
    $module_name = 'transparansi';
    $controller_name = 'TransparansiController';

    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::resource("$module_name", "$controller_name");
});
