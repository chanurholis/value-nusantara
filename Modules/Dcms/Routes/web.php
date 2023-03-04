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

use Illuminate\Support\Facades\Route;

// Route::get('/', 'DcmsController@index')->name('index-dcms');

Route::prefix('dcms')->group(function() {
    Route::get('/', 'DcmsController@index');
});
